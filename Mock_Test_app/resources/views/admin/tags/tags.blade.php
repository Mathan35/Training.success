@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Tags</p>
                <form action="{{route('create_tags')}}" method="post" enctype = "multipart/form-data">
                    @csrf

                    <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" name = "name" class="form-control" id="" >
                    </div>

                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

            <div class = "table-content mx-5 mt-3">
                <p>List of Tags</p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tags as $data)
                        <tr>
                            <th scope="row">{{$data['id']}}</th>
                            <td>{{$data['name']}}</td>
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_tags',$data['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_tags',$data['id'])}}">Delete</a> 
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