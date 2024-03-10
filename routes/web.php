<?php

use App\Http\Controllers\CRUD;
use Illuminate\Support\Facades\Route;

Route::get('/create', fn() => view('create'));
Route::get('/sales', fn() => view('sales'));
//Route::get('/edit/{invoice_id}', fn() => view('sales'));
Route::get('/load-docnum/{doctype}', [CRUD::class, 'loadDocumentNumber'])->name('load.docnum');

Route::get('/categories', [CRUD::class, 'getCategories'])->name('categories.index');

Route::post('/create-product', [CRUD::class, 'createProduct'])->name('create.product');

