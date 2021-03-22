<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {    return view('home.index');})      ->name('home.index');

Route::get('/pessoa',        [PersonController::class,  'index'])       ->name('person.index');
Route::get('/pessoa/buscar', [PersonController::class,  'searchIndex']) ->name('person.search.index');
Route::get('/endereco',      [AddressController::class, 'index'])       ->name('address.index');
Route::get('/telefone',      [PhoneController::class,   'index'])       ->name('phone.index');


Route::post('/pessoa/cpfCheck', [PersonController::class, 'cpfCheck'])->name('person.cpfCheck');
Route::post('/pessoa/salvar', [PersonController::class, 'save'])->name('person.save');
Route::post('/pessoa/buscar', [PersonController::class, 'getPerson'])->name('person.getPerson');



Route::post('/endereco/salvar', [AddressController::class, 'save'])->name('address.save');


/* test route */
Route::get('/test', [PersonController::class, 'getPerson']);



