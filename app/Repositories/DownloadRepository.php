<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Storage;

class DownloadRepository
{
    public function returnPDF($pdf, $name, $mode)
    {
        if($mode === 'save') {
            // This method assigns a storage path, saves the PDF file in that path and returns the URL to access the saved file.
            return $this->saveAndReturnPDF($pdf, $name);
        }

        // This method returns a Base64 string from the generated PDF, without storing it.
        return $this->returnStringPDF($pdf, $name);
    } 

    private function returnStringPDF($pdf, $name): Array
    {
        return [
            'name' => $name,
            'content' => $pdf->base64pdf()
        ];
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
}