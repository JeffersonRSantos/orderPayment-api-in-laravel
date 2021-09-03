<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/order-payment', 'SolicitationUserController@index');
Route::get('/list-payments', 'SolicitationUserController@listPayments');
Route::get('/search', 'SolicitationUserController@search');
