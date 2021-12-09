
@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5 update-form">
            <a class = "text-decoration-none" href="{{route('mock_banks')}}">Back</a>
                <p>Add Mock Bank</p>
                <form action="{{route('update_mock_bank',$mock_bank->id)}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <label for="name">Technology Type</label>
                    <select name = "technology_id" class=" mt-3 form-select" aria-label="Default select example">
                    <option value = "{{$mock_bank->getTechnology->id}}" >{{$mock_bank->getTechnology->name}}</option>
                        @foreach($technology as $data)
                        <option value = "{{$data['id']}}" >{{$data['name']}}</option>
                        @endforeach
                    </select>
                    <div class="form-group mt-2">
                        <label for="name">Title</label>
                        <input type="text" name = "title" value = "{{$mock_bank->title}}" class="form-control" id="title" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image</label>
                        <input type="file" name = "image" value = "{{$mock_bank->image}}" class="form-control" id="image" >
                        <img class = "" src="{{asset('assets/images/'.$mock_bank->image)}}" alt="">
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" name = "description" id="" rows="3">{{$mock_bank->description}}</textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Video URL</label>
                        <input type="text" name = "video_url" value = "{{$mock_bank->video_url}}" class="form-control" id="video_url" >
                    </div>
                    <select name = "status" class="mt-3 form-select" aria-label="Default select example">
                        <option value = "{{$mock_bank->status}}" selected><?php echo $mock_bank->status== 1? "Active":"De-Active"?></option>
                        <option value="1">Active</option>
                        <option value="0">De-active</option>
                    </select>
                
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection