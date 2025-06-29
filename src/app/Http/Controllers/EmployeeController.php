<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class EmployeeController extends Controller
{
    //
    public function show($id = null)
    {
        return view('employee', ['employee' => $id ? Employee::where('id', $id)->first() : null]);
    }

    public function store(Request $request)
    {

        $employee = new Employee($request->all());
        $employee->department = serialize($request->input('department'));
        // $employee -> first_name = $request->input('first_name');
        // $employee -> last_name = $request->input('last_name');
        // $employee -> department = $request->input('department');
        $employee->save();
       // var_dump($request->all());
       return Redirect::route('show_employee', ['id' => $employee->id]);
    }
}
