<?php

namespace App\Http\Controllers;

use App\Education;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Position;
use App\Status;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::with(['status','position','education'])->get();
        // $json = response()->json($employee);        
        // dd($json->original);
        return view('pages.employee.index',[    
            'employee' => $employee
            // 'json' => $json->original
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = null;
        $education = Education::all();
        $position = Position::all();
        $status = Status::all();
        // \dd($data);
        return view('pages.employee.form', compact('employee','education','position','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->all();

        Employee::create($data);
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $education = Education::all();
        $position = Position::all();
        $status = Status::all();
        // \dd($data);
        return view('pages.employee.form', compact('employee','education','position','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $data = $request->all();

        Employee::findOrFail($id)->update($data);
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->route('employee.index');
    }
}
