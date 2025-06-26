<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function showForm()
    {
        return view('upload-form');
    }

    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload-photo')) {
            $file = $request->file('upload-photo');
            echo $file->path();
            echo $file->getClientOriginalName();
            $file->storeAs('Images', $file->getClientOriginalName());
        } else {
            echo 'No file uploaded';
        }
    }
}
