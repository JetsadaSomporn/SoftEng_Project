<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('แก้ไข') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <form method="POST" action="/edit/subj/{{$data->first()->id}}">
                        @csrf
                       
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">course_code</label>
                            <input type="text" class="form-control" value="{{$data->first()->course_code}}"  name="course_code">
                        
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ชื่อวิชา</label>
                        <input type="text" class="form-control" value="{{$data->first()->course_name}}" name="course_name">
                        
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">เทอม</label>
                        <input type="text" class="form-control" value="{{$data->first()->course_term}}" name="course_term">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">ปีการศึกษา</label>
                            <input type="text" class="form-control" value="{{$data->first()->course_year}}" name="course_year">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>