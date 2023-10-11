<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('รายละเอียดวิชา') }}
            @foreach ($data as $item)
                {{$item->course_name}}
            @endforeach
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($data as $c)
                        <h1 class="text-2xl font-semibold">{{ 'วิชา: '.$c->course_name }}</h1>
                        <p>รหัสวิชา: {{ $c->course_code }}</p>
                        <p>ภาค/ปีการศึกษา: {{ $c->course_term . '/' . $c->course_year }}</p>
                        <p>สร้างเมื่อ: {{ $c->created_at }}</p><br>
                        <!-- แสดงข้อมูลเพิ่มเติมของรายวิชาตามที่คุณต้องการ -->

                        <!-- Button trigger modal -->
                        <a href="/addstudent?course_id={{$c->id}}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_1">
                            เพิ่มนักศึกษา
                        </a>
                    @endforeach
                    

                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_1">
                        เพิ่มนักศึกษา
                    </button> --}}

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มนักศึกษา</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('addstudent') }}">
                                        
                                        @csrf
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">รหัสนักศึกษา:</label>
                                            <input type="text" class="form-control" name="stdbox" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">ชื่อ-นามสกุล:</label>
                                            <textarea class="form-control" name="namebox" id="message-text"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">อีเมล:</label>
                                            <textarea class="form-control" name="emailbox" id="message-text"></textarea>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label for="subject_id" class="form-label">รายวิชา:</label>
                                            <select class="form-select" name="subject_id" id="subject_id">
                                                @foreach($data as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->course_name }}</option>
                                                @endforeach
                                            </select>
                                            @foreach($data as $subject)
                                                <input type="hidden" class="form-control" name="course_id" id="course_id"  value="{{$subject->id}}">
                                            @endforeach
                                        </div>
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

                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        นำเข้าไฟล์ excel
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">นำเข้าไฟล์ excel</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('upload') }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">อัพโหลดไฟล์:</label>
                                            <input type="file" class="form-control" name="file" id="recipient-name">
                                        </div>
                                        
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

                    <table class="table">
                        <thead>
                            <th>ลำดับ</th>
                            <th>รหัสนักศึกษา</th>
                            <th>ชื่อ นามสกุล</th>
                            <th>อีเมล</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if($data_student->count() > 0)
                                @foreach ($data_student as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->std }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="/edit/detial/{{ $item->id }}" class="btn btn-warning" >แก้ไข</a>
                                            {{-- <button type="button" class="btn btn-warning editbtn" data-bs-toggle="modal" data-bs-target="#exampleModal_2" data-student-id="{{ $item->id }}">แก้ไข</button> --}}
                                            <a href="/delete/detial/{{$item->id}}" class="btn btn-danger">ลบ</a>
                                        </td>
                                    </tr>
                                @endforeach                               
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">ไม่มีข้อมูลในตาราง</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    

                
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



   
