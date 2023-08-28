<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Traits\ResponseTrait;
use Exception;

class PDFController extends Controller
{
    use ResponseTrait;

    public function test(Request $request) 
    {
        try {
            $top = 2.5; 
            $right = 2.5; 
            $bottom = 2.5; 
            $left = 2.5; 

            $base_pdf = view('base_pdf')->with([
                'data' => $request->data
            ])->render();
    
            $save_to_file = storage_path('app/labels/test.pdf');
    
            $pdf = Browsershot::html($base_pdf)
                ->showBackground()
                ->margins($top, $right, $bottom, $left, 'cm')
                ->format('A4');
                /* ->save($save_to_file); */
    
            $data = [
                'name' => 'Invoice',
                'content' => $pdf->base64pdf()
            ];

            return $this->responseSuccess($data, 'PDF generated successfully');
        } catch (Exception $e) {
            return $this->responseError([], $e->getMessage());
        }
    }
}
