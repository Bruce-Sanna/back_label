<?php

use App\Http\Controllers\DomPDFController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| 8637

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [PDFController::class, 'pdf']);

Route::get('/label', [PDFController::class, 'label']);

Route::get('/schema', [PDFController::class, 'schema']);

Route::get('/schema-example', [PDFController::class, 'schema_example']);

Route::get('/schema_two', [PDFController::class, 'schema_two']);

 




/* DOM Pdf */
Route::get('/dom-pdf',[DomPDFController::class, 'index']);                 







































Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
