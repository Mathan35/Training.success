@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Tags Bank</p>
                <form action="{{route('create_tag_bank')}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <label for="name">Tag type</label>
                    <select name = "tag_id" class=" mt-3 form-select" aria-label="Default select example">
                        @foreach($tags as $value)
                        <option value = "{{$value['id']}}" >{{$value['name']}}</option>
                        @endforeach
                    </select>

                    <label for="name">Mock Bank Type</label>
                    <select name = "mock_bank_id" class=" mt-3 form-select" aria-label="Default select example">
                        @foreach($mock_bank as $data)
                        <option value = "{{$data['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

            <div class = "table-content mx-5 mt-3">
                <p>List of Tag Bank</p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tag type</th>
                            <th scope="col">Mock Bank type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tag_bank as $data)
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->getTag->name}}</td>
                            <td>{{$data->getMockBank->title}}</td>
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_tag_bank',$data['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_tag_bank',$data['id'])}}">Delete</a> 
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