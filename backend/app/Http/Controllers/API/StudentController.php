<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $student = Student::all();
        return response()->json([
            'status'=> 200,
            'students'=> $student
        ]);
    }

    public function store(Request $request){

    $student = new Student;
    $student->name = $request->input('name'); 
    $student->email = $request->input('email'); 
    $student->course = $request->input('course');  
    $student->phone = $request->input('phone'); 

    $student->save();
        // return  $student;
    return response()->json([
        'status' => 200,
        'message' => 'Student Added Successfully'
    ]);

    }
}
