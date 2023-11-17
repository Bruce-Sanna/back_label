<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Traits\ResponseTrait;
use Exception;
use App\Repositories\PDFRepository;

class PDFController extends Controller
{
    use ResponseTrait;

    public function __construct(private PDFRepository $pdf)
    {
        $this->pdf = $pdf;
    }

    public function test(Request $request) 
    {
        $margins = [
            'top' => 1.5, //cm
            'right' => 1.5,
            'bottom' => 1.5,
            'left' => 1.5,
        ];

        $name = 'invoice.pdf';

        /*
        | The format options available by puppeteer are:
        | https://spatie.be/docs/browsershot/v2/usage/creating-pdfs#content-using-a-predefined-format
        */
        $page_size = 'Letter';

        try {
            $data = $this->pdf->print($request, $name, $page_size, $margins, 'show');

            return $this->responseSuccess($data, 'PDF generated successfully!');
        } catch (Exception $e) {
            return $this->responseError([], $e->getMessage());
        }
    }

    public function manifest(Request $request) 
    {
        $margins = [
            'top' => 1.1, //cm
            'right' => 1.1,
            'bottom' => 1.1,
            'left' => 1.1,
        ];

        $name = 'Manifest.pdf';
        
        /*
        | The format options available by puppeteer are:
        | https://spatie.be/docs/browsershot/v2/usage/creating-pdfs#content-using-a-predefined-format
        */
        $page_size = 'Letter';

        try {
            $data = $this->pdf->print($request, $name, $page_size, $margins, 'show', 'manifest');

            return $this->responseSuccess($data, 'PDF generated successfully!');
        } catch (Exception $e) {
            return $this->responseError([], $e->getMessage());
        }
    }
}
