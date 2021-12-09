@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5 update-form">
                <a class = "text-decoration-none" href="{{route('technology')}}">Back</a>
                <p>Update Technology</p>
                <form action="{{route('update_technology',$data->id)}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" name = "name" value = "{{$data->name}}" class="form-control" id="name" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image</label>
                        <input type="file" name = "image" value = "{{$data->image}}" class="form-control" id="image" >
                        <img class = "" src="{{asset('assets/images/'.$data->image)}}" alt="">
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" name = "description" id="" rows="3">{{$data->description}}</textarea>
                    </div>
                
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection