<?php 

namespace App\Repositories;
use Spatie\Browsershot\Browsershot;
use App\Repositories\DownloadRepository;

class PDFRepository
{
    public function __construct(private DownloadRepository $download)
    {
        $this->download = $download;
    }

    public function print($data, $name, $page_size, $margins, $mode = 'save')
    {
        $html = $this->createInvoiceView($data);

        $pdf = $this->createPDF($html, $page_size, $margins);

        return $this->download->returnPDF($pdf, $name, $mode);
    }

    public function createInvoiceView($content)
    {
        $html = view('base_pdf')->with([
            'data' => $content->data
        ])->render();

        return $html;
    }

    private function createPDF($html, $page_size, $margins): Browsershot
    {
        return Browsershot::html($html)
            ->showBackground()
            ->margins($margins['top'], $margins['right'], $margins['bottom'], $margins['left'],'cm')
            ->format($page_size);
    }
}