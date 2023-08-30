<?php 

namespace App\Repositories;

use Exception;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class LabelRepository
{
    public function __construct(private DownloadRepository $download)
    {
        $this->download = $download;
    }

    public function print($data, $mode = 'save')
    {
        $label = $this->setLabelInformation($data);

        $pages = $this->createLabelPages($data->pages);

        $html = $this->createView($label, $pages);

        $pdf = $this->createPDF($html, $label, $pages);

        return $this->download->returnPDF($pdf, $label['name'], $mode);
        // return $this->returnPDF($pdf, $label['name'], $mode);
    }

    private function setLabelInformation($data): array
    {
        return [
            'name' => $data->name.'.pdf',
            'width' => $data->width,
            'height' => $data->height,
        ];
    }

    private function createLabelPages($pages): array
    {
        $full_pages = [];

        foreach($pages as $page) {
            for($i = 0;$i < $page['quantity']; $i++) {
                array_push($full_pages, $page['page']);
            }
        }

        return $full_pages;
    }

    private function createView($label ,$pages): String
    {
        $html = view('label')->with([
            'width' => centimetersToPixels($label['width']),
            'height' => centimetersToPixels($label['height'])+0.5,
            'pages' => $pages
        ])->render();

        return $html;
    }

    private function createPDF($html, $label, $pages): Browsershot
    {
        return Browsershot::html($html)
            ->showBackground()
            ->paperSize(centimetersToPixels($label['width']), centimetersToPixels($label['height']), 'px')
            ->pages($this->setPagesToPrint(count($pages)));
    }

    private function createResponse($file): String
    {
        return asset($this->getDownloadUrl(($file)));
    }

    private function getDownloadUrl($file): String 
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

    public function validateNumberOfPages($pages): Void
    {
        $sum = array_reduce($pages, function($carry, $item) {
            return $carry + $item['quantity'];
        });

        if($sum < 1){
            throw ValidationException::withMessages(['error' => 'Send at least one label to create.']); 
        }

        if($sum > 500){
            throw ValidationException::withMessages(['error' => 'The total quantity of labels must be less than 500.']); 
        }
    }
}