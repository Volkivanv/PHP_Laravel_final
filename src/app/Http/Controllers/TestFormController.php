<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestFormController extends Controller
{
    //
    public function displayForm()
    {
        return view('myForm');
    }

    public function postForm(Request $request)
    {
        echo $request->input('my_name') . '<br>';
        echo $request->input('password') . '<br>';
        echo $request->input('age') . '<br>';
       // echo $request->input('gender') . '<br>';
        var_dump($request->input('category'));
    }
}
