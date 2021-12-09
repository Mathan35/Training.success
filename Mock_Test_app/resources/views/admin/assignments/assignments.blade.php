
@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Assignments</p>
                <form action="{{route('create_assignments')}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="title">Title</label>
                        <input type="text" name = "title" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" name = "description" id="" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Image </label>
                        <input type="file" name = "image" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Duration</label>
                        <input type="text" name = "duration" class="form-control" id="" >
                    </div>
                   
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

            <div class = "table-content mx-5 mt-3">
                <p>List of Assignments</p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description </th>
                            <th scope="col">Image </th>
                            <th scope="col">Duration</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assignment as $data)
                        <tr>
                            <th scope="row">{{$data['id']}}</th>
                            <td>{{$data['title']}}</td>
                            <td>{{$data['description']}}</td>
                            <td><img src="{{asset('assets/images/'.$data['image'])}}" alt=""></td>
                            <td>{{$data['duration']}}</td>
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_assignments',$data['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_assignments',$data['id'])}}">Delete</a> 
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