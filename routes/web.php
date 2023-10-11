<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Models\course;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $data = course::all();
        return view('dashboard',compact('data'));
    })->name('dashboard');
});


Route::post('/subject/create',[SubjectController::class,'create'])->name('dashboard.creat');
Route::get('/go/subj/{id}',[SubjectController::class,'detial']);
Route::get('/delete/subj/{id}',[SubjectController::class,'delete']);
Route::get('/go_edit/subj/{id}',[SubjectController::class,'go_edit']);
Route::post('/edit/subj/{id}',[SubjectController::class,'edit']);

Route::get('/gosubj',[StudentController::class,'index']);
Route::post('/addstudent',[StudentController::class,'addstuddent'])->name('addstudent');
Route::get('delete/detial/{id}',[StudentController::class,'delete']);

Route::get("/edit/detial/{id}",[StudentController::class,'edit']);
Route::post('/update-student/{id}',[StudentController::class,'update']);

Route::post('/upload-student',[StudentController::class,'upload'])->name('upload');
