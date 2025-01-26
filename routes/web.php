<?php

use App\Filament\Pages\CetakData;
use App\Http\Controllers\UploadDataController;
use App\Livewire\CetakPDF;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/Upload-Data', [UploadDataController::class, 'store'])->name('upload.data');
Route::get('/print-data', [CetakPDF::class, 'cetakPDF'])->name('print.data');
// Route::get('/cetak-data', CetakData::class)->name('cetak-data');
