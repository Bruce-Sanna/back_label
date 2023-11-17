<?php

use App\Http\Controllers\Api\LabelController;
use App\Http\Controllers\Api\PDFController as ApiPDFController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Reeturns all label schemas
Route::get('labels', [LabelController::class, 'index']);

// Store label templates.
Route::post('/labels', [LabelController::class, 'storeTemplate']);

// Update label templates
Route::put('/labels/{label}', [LabelController::class, 'updateTemplate']);

// Generate PDF with labels.
Route::post('/labels/print', [LabelController::class, 'print']);

Route::get('/labels/{label}', [LabelController::class, 'show']);

Route::delete('/labels/{label}', [LabelController::class, 'destroy']);

/* To Generate PDF */
Route::post('/pdf/create', [ApiPDFController::class, 'test']);

/* To generate Manifest PDF */
Route::post('/pdf/manifest/create', [ApiPDFController::class, 'manifest']);