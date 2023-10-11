<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\course;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $course = course::where('course_name', $row['course_name'])->first();
        
            return new Student([
                
                'std' => $row['std'],
                'name' => $row['name'],
                'email' => $row['email'],
                'courses_id' => $row['courses_id'],
            ]);
       
        
    }
}
