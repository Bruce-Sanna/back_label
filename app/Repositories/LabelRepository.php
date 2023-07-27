<?php 

namespace App\Repositories;

use Exception;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class LabelRepository
{
    public function print($data, $mode = 'save')
    {
        $label = $this->setLabelInformation($data);

        $pages = $this->createLabelPages($data->pages);

        $html = $this->createView($label, $pages);

        $pdf = $this->createPDF($html, $label, $pages);

        return $this->returnPDF($pdf, $label['name'], $mode);
    }

    private function returnPDF($pdf, $name, $mode)
    {
        if($mode === 'save') {
            // This method assigns a storage path, saves the PDF file in that path and returns the URL to access the saved file.
            return $this->saveAndReturnPDF($pdf, $name);
        }

        // This method returns a Base64 string from the generated PDF, without storing it.
        return $this->returnStringPDF($pdf, $name);
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

    private function assingPathToSave($name): String 
    {   
        // Create folder if not exists.
        if(!Storage::exists('public/labels')) {
            Storage::makeDirectory('public/labels'); 
        }

        // Returns the path where the pdf will be saved.
        return storage_path('app/public/labels/'.$name);
    }

    private function createPDF($html, $label, $pages): Browsershot
    {
        return Browsershot::html($html)
            ->showBackground()
            ->paperSize(centimetersToPixels($label['width']), centimetersToPixels($label['height']), 'px')
            ->pages($this->setPagesToPrint(count($pages)));
    }

    private function returnStringPDF($pdf, $name): Array
    {
        return [
            'name' => $name,
            'content' => $pdf->base64pdf()
        ];
    }

    private function saveAndReturnPDF($pdf, $name)
    {
        $pdf->save($this->assingPathToSave($name));

        return $this->createResponse($name);
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