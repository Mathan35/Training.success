@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
            <a class = "text-decoration-none" href="{{route('assignments_students')}}">Back</a>
                <p>Update Assignments to the Students</p>
                <form action="{{route('update_assignments_students',$assignment_student->id)}}" method="post" enctype = "multipart/form-data">
                    @csrf

                    <label for="name">Student Name</label>
                    <select name = "user_id" class=" mt-3 form-select" aria-label="Default select example">
                        <option selected value = "{{$assignment_student->getUser->id}}" >{{$assignment_student->getUser->name}}</option>
                        @foreach($user as $data)
                        <option value = "{{$data['id']}}" >{{$data['name']}}</option>
                        @endforeach
                    </select>
                    <label for="name">Assignment</label>
                    <select name = "assignment_id" class=" mt-3 form-select" aria-label="Default select example">
                        <option selected value = "{{$assignment_student->getAssignment->id}}" >{{$assignment_student->getASsignment->title}}</option>
                        @foreach($assignment as $data)
                        <option value = "{{$data['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>
                   
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection