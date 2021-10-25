<?php

use App\Http\Controllers\DeclareController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/about', [HomeController::class,'getAbout'])->name('about');

Route::get('/declare', [HomeController::class,'getDeclare'])->name('declare');

Route::post('/declarations/submit', [DeclareController::class, 'submit'])->name('postDeclare');

Route::get('/declarations/all', [DeclareController::class, 'allData'])->name('allDeclaration');

Route::get('/declarations/all/{id}', [DeclareController::class, 'showOneDeclaration'])->name('declarationDetail');

Route::get('/declarations/all/{id}/update', [DeclareController::class, 'updateDeclaration'])->name('declarationUpdate');

 Route::post('/declarations/all/{id}/update', [DeclareController::class, 'updateDeclarationSubmit'])->name('declaration-update-submit');

Route::get('/declarations/all/{id}/delete', [DeclareController::class, 'deleteDeclaration'])->name('declarationDelete');

Route::post('/declarations/all/search', [DeclareController::class,'search'])->name('search');
