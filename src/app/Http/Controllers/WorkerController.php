<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WorkerController extends Controller
{
    //
    public function index()
    {
        $workers = Worker::all();
        return view('worker-form', ['workers' => $workers, 'worker' => null]);
    }
    public function get($id)
    {
        return view('worker-form', ['workers' => null, 'worker' => $id ? Worker::where('id', $id)->first() : null]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:50'],
            'surname' => ['required', 'max:50'],
            'email' => ['required'],
        ]);

        $worker = new Worker($request->all());
        $worker->save();
        return Redirect::route('show_worker', ['id' => $worker->id]);
    }
}
