<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeDataController extends Controller
{
    public function countries(){
       $countries= Country::all();
       return response()->json($countries);
    }
    public function cities(Country $country){
        return response()->json($country->cities);
    }
    public function departments(){
        $depts= Department::all();
        return response()->json($depts);
     }
}
