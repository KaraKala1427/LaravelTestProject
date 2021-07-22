<?php

use App\Http\Controllers\DeclareController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/declarations', function () {
    return view('declare');
})->name('declare');

// обработчик url адресов - именные отслеживание url адресов
Route::post('/declarations/submit', [DeclareController::class, 'submit'])->name('postDeclare');

Route::get('/declarations/all', [DeclareController::class, 'allData'])->name('allDeclaration');

Route::get('/declarations/all/{id}', [DeclareController::class, 'showOneDeclaration'])->name('declarationDetail');

Route::get('/declarations/all/{id}/update', [DeclareController::class, 'updateDeclaration'])->name('declarationUpdate');

 Route::post('/declarations/all/{id}/update', [DeclareController::class, 'updateDeclarationSubmit'])->name('declaration-update-submit');

Route::get('/declarations/all/{id}/delete', [DeclareController::class, 'deleteDeclaration'])->name('declarationDelete');
