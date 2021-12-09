@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Technology</p>
                <form action="{{route('create_technology')}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" name = "name" class="form-control" id="name" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image</label>
                        <input type="file" name = "image" class="form-control" id="image" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" name = "description" id="" rows="3"></textarea>
                    </div>
                
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

            <div class = "table-content mx-5 mt-3">
                <p>List of Technology</p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($technology as $data)
                        <tr>
                            <th scope="row">{{$data['id']}}</th>
                            <td>{{$data['name']}}</td>
                            <td><img src="{{asset('assets/images/'.$data->image)}}" alt=""></td>
                            <td>{{$data['description']}}</td>
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_technology',$data['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_technology',$data['id'])}}">Delete</a> 
                            </td>
                        </tr>
                        @empty
                        <tr>
                            No data found
                        </tr>
                        @endforelse
                    </tbody>
                </table><br>
            </div>
        </div>
    </div>
@endsection