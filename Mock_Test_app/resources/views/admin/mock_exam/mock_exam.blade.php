@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Mock Exam</p>
                <form action="{{route('create_mock_exam')}}" method="post" enctype = "multipart/form-data">
                    @csrf

                    <label for="name">Mock Bank Type</label>
                    <div id="output"></div>
                    <select data-placeholder="Choose tags ..."  name="mock_bank_id[]" multiple class="chosen-select">
                        @foreach($mock_bank as $data)
                        <option value = "{{$data['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>
    
                    <div class="form-group mt-2">
                        <label for="title">Title</label>
                        <input type="text" name = "title" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Image</label>
                        <input type="file" name = "image" class="form-control" id="" >
                    </div>
                   
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

            <div class = "table-content mx-5 mt-3">
                <p>List of Mock Exams</p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image </th>
                            <th scope="col">Mock Bank Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mock_exam as $data)
                        <tr>
                            <th scope="row">{{$data['id']}}</th>
                            <td>{{$data['title']}}</td>
                            <td><img src="{{asset('assets/images/'.$data['image'])}}" alt=""></td>
                            <td>{{$data->getMockBank->title}}</td>   
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_mock_exam',$data['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_mock_exam',$data['id'])}}">Delete</a> 
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
    
<x-dropdown-link/>
@endsection