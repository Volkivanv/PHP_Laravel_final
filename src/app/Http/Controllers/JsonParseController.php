<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonParseController extends Controller
{
    //
    public function parseJson(Request $request)
    {
        //raw
     //   var_dump($request->json()->all());
        //decode
        // var_dump(json_decode($request->getContent()));
        // не забывать передавать в header content_type
        echo $request->json()->get('first_name');
    }
}
