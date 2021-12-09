
@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5 update-form">
            <a class = "text-decoration-none" href="{{route('assignments_images')}}">Back</a>
                <p>Add Assignment Images</p>
                <form action="{{route('update_assignment_images',$assignment_images['id'])}}" method="post" enctype = "multipart/form-data">
                    @csrf

                    <label for="name">Assignment Type</label>
                    <select name = "assignment_id" class=" mt-3 form-select" aria-label="Default select example">
                        <option value = "{{$assignment_images->getAssignmentImages->id}}" >"{{$assignment_images->getAssignmentImages->title}}</option>
                        @foreach($assignment as $data)
                        <option value = "{{$data['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>
              
                    <div class="form-group pt-2 pb-2 pr-5">
                        <label for="image_url">Images</label> <br>
                        <input type="file" value = "{{$assignment_images->image}}" name = "image" class="form-control" id="" >
                        <img src="{{asset('assets/images/'.$assignment_images->image)}}" alt="">
                    </div>
                                     
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection