<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [
        'std',
        'name',
        'email',
        'courses_id',
        // คอลัมน์อื่น ๆ ที่คุณต้องการ Mass Assignment
    ];
}
