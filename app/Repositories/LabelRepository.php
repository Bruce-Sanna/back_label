<?php 

namespace App\Repositories;

use Exception;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;

class LabelRepository
{
    public function print($data)
    {
        $label = $this->setLabelInformation($data);

        $pages = $this->createLabelPages($data->pages);

        $html = $this->createView($label, $pages);

        $path = $this->assingPathToSave($label['name'].$label['extension']);

        $this->createPDF($html, $path, $label, $pages);

        return $this->createResponse($label['name'].$label['extension']);
    }

    public function setLabelInformation($data): array
    {
        return [
            'extension' => '.pdf',
            'name' => $data->name,
            'width' => $data->width,
            'height' => $data->height,
        ];
    }

    public function createLabelPages($pages): array
    {
        $full_pages = [];

        foreach($pages as $page) {
            for($i = 0;$i < $page['quantity']; $i++) {
                array_push($full_pages, $page['page']);
            }
        }

        return $full_pages;
    }

    public function createView($label ,$pages): String
    {
        $html = view('label')->with([
            'width' => centimetersToPixels($label['width']),
            'height' => centimetersToPixels($label['height'])+0.5,
            'pages' => $pages
        ])->render();

        return $html;
    }

    private function assingPathToSave($name): String 
    {   
        // Create folder if not exists.
        if(!Storage::exists('public/labels')) {
            Storage::makeDirectory('public/labels'); 
        }

        // Returns the path where the pdf will be saved.
        return storage_path('app/public/labels/'.$name);
    }

    public function createPDF($html, $path, $label, $pages): void
    {
        Browsershot::html($html)
            ->showBackground()
            ->paperSize(centimetersToPixels($label['width']), centimetersToPixels($label['height']), 'px')
            ->pages($this->setPagesToPrint(count($pages)))
            ->save($path);
    }

    public function createResponse($file): String
    {
        return asset($this->getDownloadLink(($file)));
    }

    private function getDownloadLink($file): String 
    {
        if(!Storage::disk('public')->exists('labels/'.$file)){
            throw new Exception("File does not exist.", 404);
        }

        return Storage::disk('public')->url('labels/'.$file);
    }

    private function setPagesToPrint($number): String
    {
        $numbers = [];

        for($i = 1;$i <= $number*2; $i++) {
            if($i%2 !== 0) {
                array_push($numbers, $i);
            }
        }

        return implode(', ',$numbers);
    }
}