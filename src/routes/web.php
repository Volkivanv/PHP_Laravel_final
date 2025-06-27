<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\RequestTestController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/dashboard', Dashboard::class);


Route::post('/test_parameters', [RequestTestController::class, 'testRequest']);
