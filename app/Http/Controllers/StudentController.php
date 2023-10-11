<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\course;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\StudentImport; 


class StudentController extends Controller
{
    function index() {
        $students = Student::all();
        return view("students.index",['students'=>$students]);


    }

    public function addstuddent(Request $request){

        


        $student = new Student();
        $student->std = $request -> stdbox;
        $student->name = $request -> namebox;
        $student->email = $request -> emailbox;
        $courseId = $request->input('subject_id');
        $student->courses_id = $courseId ;
        $student->save();
        
    
        $data = course::where('id', $request->course_id)->get();
        $data_student = student::where('courses_id', $courseId)->get();
        return view('subjDetial',compact('data','data_student'));
        
    }

    public function delete($id){
        student::find($id)->forceDelete();
        return redirect()->back();
    }

    public function edit($id){
        $student = student::find($id);

        return view('edit-student',compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id); 
        $student->std = $request->input('std');
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->save();

        return redirect('go/subj/'.$request->input('goback-subj'))->with('success', 'แก้ไขข้อมูลนักศึกษาเรียบร้อยแล้ว');
    }

    public function upload(Request $request) 
    {
        Excel::import(new StudentImport,$request->file);
        
        return redirect()->back()->with('success', 'All good!');
    }

}
