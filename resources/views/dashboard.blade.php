<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ตารางวิชา') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Body --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        เพิ่มวิชา
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มวิชา</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('dashboard.creat') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">รหัสวิชา:</label>
                                            <input type="text" class="form-control" name="codesubject" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">ชื่อวิชา:</label>
                                            <textarea class="form-control" name="namesubject" id="message-text"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">รายละเอียดวิชา:</label>
                                            <textarea class="form-control" name="descsubject" id="message-text"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">ภาค:</label>
                                            <textarea class="form-control" name="term" id="message-text"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">ปีการศึกษา:</label>
                                            <textarea class="form-control" name="year" id="message-text"></textarea>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div >
                        <table class="table"> 
                            <thead>
                                <th>รหัสวิชา</th>
                                <th>ชื่อวิชา</th>
                                <th>เทอม</th>
                                <th>ปีการศึกษา</th>
                                <th></th>
                            </thead>
                            <tbody>
                             @foreach ($data as $course)
                                 <tr>
                                   <td>{{$course->course_code}}</td>
                                   <td><a href="/go/subj/{{$course->id}}">{{$course->course_name}}</a></td>
                                   <td>{{$course->course_term}}</td>  
                                   <td>{{$course->course_year}}</td>
                                   <td>
                                    <a href="/go_edit/subj/{{$course->id}}" class="btn btn-warning">Edit</a>
                                    <a href="/delete/subj/{{$course->id}}" class="btn btn-danger">Delete</a>
                                </td>  

                                 </tr>
                             @endforeach
    
                            </tbody>
                        </table>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
