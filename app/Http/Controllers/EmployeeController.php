<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::with(['country','city','department'])->get();
        if ($request->search) {
            $employees = Employee::where('name', "like", "%{$request->search}%")
            ->orWhere('address', "like", "%{$request->search}%")
            ->with(['country','city','department'])
            ->get();
            return response()->json($employees);
        } elseif ($request->department_id) {
            $employees = Employee::where('department_id', $request->department_id)
            ->with(['country','city','department'])->get();
            return response()->json($employees);
        }elseif ($request->country_id) {
            $employees = Employee::where('country_id', $request->country_id)
            ->with(['country','city','department'])->get();
            return response()->json($employees);
        }

        return response()->json($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
             'name'=>'required',
         ]);
         $employee= new Employee();
         $employee->name = $request->name;
         $employee->address = $request->address;
         $employee->country_id = $request->country_id;
         $employee->city_id = $request->city_id;
         $employee->department_id = $request->department_id;
         $employee->birthdate = $request->birthdate;
         $employee->date_hired = $request->date_hired;
         $employee->zip_code = $request->zip_code;
         $employee->save();

         return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->country_id = $request->country_id;
        $employee->city_id = $request->city_id;
        $employee->department_id = $request->department_id;
        $employee->birthdate = $request->birthdate;
        $employee->date_hired = $request->date_hired;
        $employee->zip_code = $request->zip_code;
        $employee->save();
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json('Delete hoye gese vai');
    }
}
