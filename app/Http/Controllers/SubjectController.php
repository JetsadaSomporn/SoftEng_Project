<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\student;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\CourseImport; 


use Illuminate\Testing\Constraints\CountInDatabase;

class SubjectController extends Controller
{
    public function index()
    {
        $course = Auth::user();
        $courseData = course::where('user_id', $course->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('dashboard', ['courseData' => $courseData]);
    }
    public function create(Request $request)
    {
        $course = new course;
        $course->course_code = $request->codesubject;
        $course->course_name = $request->namesubject;
        $course->course_desc = $request->descsubject;
        $course->course_term = $request->term;
        $course->course_year = $request->year;
        $course->user_id = $request->user_id;

        $course->save();

        return redirect('dashboard');
    }

    public function detial($id){
        
        $data = course::where('id', $id)->get();
        $data_student = student::where('courses_id', $id)->get();
        return view('subjDetial',compact('data','data_student'));
    }

    public function delete($id){
        
        $data = course::where('id', $id)->delete();
        return redirect('/dashboard');  
    }

    public function go_edit($id){
        $data = course::where('id', $id)->get();
        return view('editSubj',compact('data'));
    }

   

    public function edit(Request $request, $id){

        $course = course::where('id', $id)->first();

    if ($course) {
        $course->course_code = $request->input('course_code');
        $course->course_name = $request->input('course_name');
        $course->course_term = $request->input('course_term');
        $course->course_year = $request->input('course_year');
        $course->save();

        return redirect('dashboard')->with('success', 'ข้อมูลวิชาถูกแก้ไขเรียบร้อยแล้ว');
    } else {
        return redirect('dashboard')->with('error', 'ไม่พบข้อมูลวิชา');
    }

    }

    public function upload(Request $request) 
    {
        Excel::import(new CourseImport,$request->file);
        
        return redirect('/dashboard')->with('success', 'All good!');
    }

}
