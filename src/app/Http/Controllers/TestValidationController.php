<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TestValidationController extends Controller
{
    //
    public function show()
    {
        return view('employee_validation');
    }

    public function post(Request $request)
    {
            //code...
           $validated = $request->validate([
                'fullname' => ['required'],
                'password' => ['min:5']
            ]);


    }
}
