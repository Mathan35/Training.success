
@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Assignments to the Students</p>
                <form action="{{route('create_assignments_students')}}" method="post" enctype = "multipart/form-data">
                    @csrf

                    <label for="name">Student Name</label>
                    <select name = "user_id" class=" mt-3 form-select" aria-label="Default select example">
                        @foreach($user as $data)
                        <option value = "{{$data['id']}}" >{{$data['name']}}</option>
                        @endforeach
                    </select>
                    <label for="name">Assignment</label>
                    <select name = "assignment_id" class=" mt-3 form-select" aria-label="Default select example">
                        @foreach($assignment as $data)
                        <option value = "{{$data['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>
                   
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

            <div class = "table-content mx-5 mt-3">
                <p>List of Assignments</p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Assignment Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assignment_student as $value)
                        <tr>
                            <th scope="row">{{$value->getUser->user_id}}</th>
                            <td>{{$value->getUser->name}}</td>
                            <td>{{$value->getAssignment->title}}</td>
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_assignments_students',$value['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_assignments_students',$value['id'])}}">Delete</a> 
                            </td>
                        </tr>
                        @empty
                        <p>
                            No data found
                        </p>
                        @endforelse
                    </tbody>
                </table><br>
            </div>
        </div>
    </div>
@endsection