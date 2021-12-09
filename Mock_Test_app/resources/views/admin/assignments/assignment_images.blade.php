@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Assignment Images</p>
                <form action="{{route('create_assignment_images')}}" method="post" enctype = "multipart/form-data">
                    @csrf

                    <label for="name">Assignment Type</label>
                    <select name = "assignment_id" class=" mt-3 form-select" aria-label="Default select example">
                        @foreach($assignment as $data)
                        <option value = "{{$data['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>
                    <div class="form-group mt-2">
                        <label for="image_url">Image URL</label>
                        <input type="file" name = "image" class="form-control" id="" >
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
                            <th scope="col">Assignment Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assignment_images as $value)
                        <tr>
                            <th scope="row">{{$value['id']}}</th>
                            <td>{{$value->getAssignmentImages->title}}</td>
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_assignment_images',$value['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_assignment_images',$value['id'])}}">Delete</a> 
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