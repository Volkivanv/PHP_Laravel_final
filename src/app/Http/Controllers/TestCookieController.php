<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestCookieController extends Controller
{
    //
    public function testCookie(Request $request)
    {
        $sessionIdentify = $request->cookie('laravel_session');
        $session = $request->session();
        echo $sessionIdentify . ' ';
        // var_dump($session);
        echo $session->get('_token');
    }
}
