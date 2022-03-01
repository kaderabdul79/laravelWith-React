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

    public function edit($id){
        $student = Student::find($id);
        return response()->json([
            'status'=> 200,
            'students'=> $student
        ]);
    }

    public function update(Request $request,$id){
        $student = Student::find($id);
        
            if($student)
            {

                $student->name = $request->input('name');
                $student->course = $request->input('course');
                $student->email = $request->input('email');
                $student->phone = $request->input('phone');
                $student->update();

                return response()->json([
                    'status'=> 200,
                    'message'=>'Student Updated Successfully',
                ]);
            }
            else
            {
                return response()->json([
                    'status'=> 404,
                    'message' => 'No Student ID Found',
                ]);
            }

    }


}
