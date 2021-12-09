@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5 update-form">
            <a class = "text-decoration-none" href="{{route('assignments')}}">Back</a>
                <p>Add Assignments</p>
                <form action="{{route('update_assignments',$assignment['id'])}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="title">Title</label>
                        <input type="text" value = "{{$assignment['title']}}" name = "title" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea class="form-control"  value = "{{$assignment['description']}}" name = "description" id="" rows="3">{{$assignment['description']}}</textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Image</label>
                        <input type="file" name = "image"  value = "{{$assignment['image']}}" class="form-control" id="" >
                        <img src="{{asset('assets/images/'.$assignment['image'])}}" alt="">
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Duration</label>
                        <input type="text" name = "duration"  value = "{{$assignment['duration']}}"  class="form-control" id="" >
                    </div>
                   
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection