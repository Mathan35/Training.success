@extends('layouts.header')
@section('content')
            <div class = "mt-4 mx-5">
            <a class = "text-decoration-none" href="{{route('tags')}}">Back</a>
                <p>Update Tags</p>
                <form action="{{route('update_tags',$tags['id'])}}" method="post" enctype = "multipart/form-data">
                    @csrf

                    <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" value = "{{$tags['name']}}" name = "name" class="form-control" id="" >
                    </div>

                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection