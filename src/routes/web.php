<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JsonParseController;
use App\Http\Controllers\RequestTestController;
use App\Http\Controllers\TestCookieController;
use App\Http\Controllers\TestFormController;
use App\Http\Controllers\TestHeaderController;
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


Route::get('/test_header', [TestHeaderController::class, 'getHeader']);


Route::get('/test_cookie', [TestCookieController::class, 'TestCookie']);


Route::get('/upload_file', [FileUploadController::class, 'showForm'])->name('showForm');

Route::post('/upload_file', [FileUploadController::class, 'fileUpload'])->name('uploadFile');

Route::post('/json_parse', [JsonParseController::class, 'parseJson']);

Route::get('/get-employee-data', [EmployController::class, 'index']);

Route::post('/store-form', [EmployController::class, 'store']);

Route::put('user/{id}', [EmployController::class, 'update']);

Route::get('/form', [TestFormController::class, 'displayForm'])->name('show_form');
Route::post('/form', [TestFormController::class, 'postForm'])->name('post_form');
