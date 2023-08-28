<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabelPrintRequest;
use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Exception;
use App\Traits\ResponseTrait;
use App\Repositories\LabelRepository;
use Illuminate\Validation\ValidationException;

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
            $labels = Label::orderBy('id', 'desc')->get();

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
        $label->update([
            'name' => $request->name,
            'width' => $request->width,
            'height' => $request->height,
            'label_elements' => json_encode($request->label_elements),
        ]);

        return $this->responseSuccess($label, 'Label updated successfully');
    }

    public function print(LabelPrintRequest $request)
    {
        $this->label->validateNumberOfPages($request->pages);

        try {
            $data = $this->label->print($request, 'show');

            return $this->responseSuccess($data, 'Labels generated successfully');
        } catch (Exception $exception) {
            throw ValidationException::withMessages(['error' => 'Error creating the PDF. Try sending fewer labels.']); 

            // return $this->responseError([], $exception->getMessage());
        }
    }

    public function show(Label $label)
    {
        return $this->responseSuccess($label, 'Label found successfully');
    }

    public function destroy(Label $label)
    {
        $label->delete();

        return $this->responseSuccess([], 'Label deleted successfuly');
    }
}
