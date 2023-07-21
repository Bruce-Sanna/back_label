<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LabelPrintRequest;
use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Exception;
use App\Traits\ResponseTrait;
use App\Repositories\LabelRepository;

class LabelController extends Controller
{
    use ResponseTrait;

    public function __construct(private LabelRepository $label)
    {
        $this->label = $label;
    }

    public function index() 
    {
        try {
            $labels = Label::all();

            return $this->responseSuccess($labels, 'Labels fetched successfully');
        } catch (Exception $e) {
            return $this->responseError([], $e->getMessage());
        }
    }

    public function storeTemplate(LabelRequest $request) 
    {
        $label = Label::create([
            'name' => $request->name,
            'width' => $request->width,
            'height' => $request->height,
            'label_elements' => json_encode($request->label_elements),
        ]);

        return $this->responseSuccess($label, 'Label created successfully');;
    }

    public function updateTemplate(Label $label, LabelRequest $request)
    {
        $label->update($request->validated);

        return $this->responseSuccess($label, 'Label updated successfully');
    }

    public function print(LabelPrintRequest $request)
    {
        try {
            $response = $this->label->print($request);

            return $this->responseSuccess($response, 'Labels generated successfully');
        } catch (Exception $exception) {
            return $this->responseError([],  $exception->getMessage()); 
        }
    }
}
