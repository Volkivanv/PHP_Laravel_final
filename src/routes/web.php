<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormBuilderTestController;
use App\Http\Controllers\JsonParseController;
use App\Http\Controllers\RequestTestController;
use App\Http\Controllers\TestCookieController;
use App\Http\Controllers\TestFormController;
use App\Http\Controllers\TestHeaderController;
use App\Http\Controllers\TestSecurityController;
use App\Http\Controllers\TestValidationController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;

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


Route::get('/employee/{id?}', [EmployeeController::class, 'show'])->name('show_employee');
Route::post('/employee', [EmployeeController::class, 'store'])->name('store_employee');

Route::get('/security_test', [TestSecurityController::class, 'show'])->name('show_security_form');
Route::post('/security_test', [TestSecurityController::class, 'post'])->name('post_security_form');

Route::get('/test_validation', [TestValidationController::class, 'show'])->name('show_validation_form');
Route::post('/test_validation', [TestValidationController::class, 'post'])->name('post_validation_form');

Route::get('/test_builder', [FormBuilderTestController::class, 'showForm'])->name('show_builder_test');
Route::post('/test_builder', [FormBuilderTestController::class, 'post'])->name('post_builder_test');

Route::get('/books', [BookController::class, 'index'])->name('show_book_form');
Route::post('/books', [BookController::class, 'store'])->name('post_book_form');

