<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployController extends Controller
{
    //
    public function index()
    {
        return view('employee-form');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $workData = $request->input('workData');
        $rating = $request->input('rating');
        echo $name . '<br>' . $email . '<br>' . $workData . '<br>' . $rating;
        echo $this->getPath($request) . '<br>';
        echo $this->getURL($request) . '<br>';

        $jsonVar = json_decode($request->input('workData'));

        $street = $jsonVar->address->street;
        $suite = $jsonVar->address->suite;
        $city = $jsonVar->address->city;
        $zipcode = $jsonVar->address->zipcode;
        $latitude = $jsonVar->address->geo->lat;
        $longitude = $jsonVar->address->geo->lng;
        echo $street . '<br>' . $suite . '<br>' . $city . '<br>' . $zipcode . '<br>' . $latitude . '<br>' . $longitude . '<br>';
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $workData = $request->input('workData');
        $rating = $request->input('rating');
        echo $id . ' ' . $name . ' ' . $email . ' ' . $workData . '<br>' . $rating;
        echo $this->getPath($request) . '<br>';
        echo $this->getURL($request) . '<br>';

        $jsonVar = json_decode($request->input('workData'));
    }

    private function getPath(Request $request)
    {
        $path = $request->path();
        return $path;
    }

    private function getUrl(Request $request)
    {
        $url = $request->url();
        return $url;
    }
}


// ["adress": {"street": "Rozhdestvenskaya", "suite": "APt 654"}]
