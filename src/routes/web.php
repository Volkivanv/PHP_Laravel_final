<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormBuilderTestController;
use App\Http\Controllers\JsonParseController;
use App\Http\Controllers\PdfGeneratorController;
use App\Http\Controllers\RequestTestController;
use App\Http\Controllers\TestCookieController;
use App\Http\Controllers\TestFormController;
use App\Http\Controllers\TestHeaderController;
use App\Http\Controllers\TestSecurityController;
use App\Http\Controllers\TestValidationController;
use App\Http\Controllers\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

// Route::get('/test_url', function () {
//     $response = new Response('my content', 200);
//     return $response;
// });

// Route::get('/test_url', function () {

//     return response('New Test URL', 200)
//         ->header('X-Header-1', 'Test')
//         ->header('Content-Type', 'application/json');
// });

Route::get('/test_url', function () {

    return redirect()->route('show_book_form');
});

// Route::get('/test_cookie', function(){
//     return response('My first cookie')
//     ->cookie('my_test_cookie', 'test_content', 5)
//     ->header('Set-cookie', 'my_test_cookie2=10')
//     ->header('X-Header-1', 'Test')
//     ->header('X-Header-2', 'Test')
//     ->header('X-Header-3', 'Test');
// });

Route::get('/test_cookie', function () {
    return response('My first cookie')
        ->cookie('my_test_cookie', 'test_content', 2)
        ->withHeaders(
            [
                'Set-cookie' => 'my_test_cookie2=10',
                'X-Header-1' => 'Test',
                'X-Header-2' => 'Test',
                'X-Header-3' => 'Test'
            ]
        )->withoutCookie('my_test_cookie2');
});

Route::get('/counter', function(){
    $counterValue = session('counter', 0);
    $counterValue++;
    session(['counter' => $counterValue]);
    return 'ok';
});

// Route::get('/result_counter', function(){
//     return session('counter', 0);
// });

// Route::get('/result_counter', function(){
//    var_dump(session()->all());
// });

Route::get('/result_counter', function(){
    if(session()->has('counter'))
    {
        session()->forget('counter');
    }

    var_dump(session()->all());
});

Route::get('/list_of_books', function(){
    $listOfBooks = session()->get('list_of_books', '');
    return response()->json(['status'=>'received', 'list_of_books' => $listOfBooks ? unserialize($listOfBooks) : 'The list is empty']);
});

Route::post('/list_of_books', function(Request $request){
    $listOfBooks = session()->get('list_of_books', '');
    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];
    $listOfBooks[] = ['author' => $request->get('author'), 'title' => $request->get('title')];
    session()->put('list_of_books', serialize($listOfBooks));
    return response()->json(['status'=>'saved', 'list_of_books' => $listOfBooks]);
});

Route::delete('/list_of_books/{id}', function($id){
    $listOfBooks = session()->get('list_of_books', '');
    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];

    if(array_key_exists($id, $listOfBooks)){
        unset($listOfBooks[$id]);
    }


    session()->put('list_of_books', serialize($listOfBooks));
    return response()->json(['status'=>'delete', 'list_of_books' => $listOfBooks]);
});

// Route::get('/file_download', function(){
//     return response()->download(base_path() . '/test.txt', 'my_test');
// });

// Route::get('/file_show', function(){
//     return response()->file(base_path() . '/test.txt');
// });

Route::get('/file_download', function(){
    return response()->streamDownload(function(){
        echo file_get_contents('https://google.com');
    }, 'google.html');
});


Route::get('/worker', [WorkerController::class, 'index'])->name('show_worker_form');
Route::get('/worker/{id}', [WorkerController::class, 'get'])->name('show_worker');
Route::post('/store-worker', [WorkerController::class, 'store'])->name('save_worker');

Route::get('/resume/{id}', [PdfGeneratorController::class, 'index'])->name('print_pdf');

