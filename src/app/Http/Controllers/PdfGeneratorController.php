<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF;

use App\Models\Worker;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfGeneratorController extends Controller
{
    //
    public function index($id){
        // $data = [
        //     'name' => 'John',
        //     'surname' => 'Doe',
        //     'email' => 'john.doe@email.com'
        // ];

        $pdf = PDF::loadView('resume', ['data' => $id ? Worker::where('id', $id)->first() : null]);
        return $pdf->stream('resume.pdf');

    }
}
