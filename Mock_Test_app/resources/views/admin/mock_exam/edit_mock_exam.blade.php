@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5 update-form">
                <a class = "text-decoration-none" href="{{route('mock_exams')}}">Back</a>
                <p>Add Mock Exam</p>
                <form action="{{route('update_mock_exam',$mock_exam['id'])}}" method="post" enctype = "multipart/form-data">
                    @csrf

                    <label for="name">Mock Bank Type</label>
                    <select name = "mock_bank_id" class=" mt-3 form-select" aria-label="Default select example">
                       <option value = "{{$mock_exam->getMockBank->id}}" >{{$mock_exam->getMockBank->title}}</option>
                        @foreach($mock_bank as $data)
                        <option value = "{{$data['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>
                    <div class="form-group mt-2">
                        <label for="title">Title</label>
                        <input type="text" value = "{{$mock_exam['title']}}" name = "title" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Image</label>
                        <input type="file" name = "image" class="form-control" id="" >
                        <img class = "" src="{{asset('assets/images/'.$mock_exam['image'])}}" alt="">

                    </div>
                   
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection