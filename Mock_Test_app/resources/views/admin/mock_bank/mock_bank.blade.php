@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Mock Bank</p>
                <form action="{{route('create_mock_bank')}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <label for="name">Technology Type</label>
                    <select name = "technology_id" class=" mt-3 form-select" aria-label="Default select example">
                        @foreach($technology as $data)
                        <option value = "{{$data['id']}}" >{{$data['name']}}</option>
                        @endforeach
                    </select>
                    <div class="form-group mt-2">
                        <label for="name">Title</label>
                        <input type="text" name = "title" class="form-control" id="title" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Image</label>
                        <input type="file" name = "image" class="form-control" id="image" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" name = "description" id="" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Video URL</label>
                        <input type="text" name = "video_url" class="form-control" id="video_url" >
                    </div>
                    <label for="name">Status</label>
                    <select name = "status" class=" mt-3 form-select" aria-label="Default select example">
                        <option selected>Status</option>
                        <option value="1">Active</option>
                        <option value="0">De-active</option>
                    </select>
                
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

            <div class = "table-content mx-5 mt-3">
                <p>List of Mock Banks</p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Technology Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Video URL</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mock_bank as $data)
                        <tr>
                            <th scope="row">{{$data['id']}}</th>
                            <td>{{$data->getTechnology->name}}</td>
                            <td>{{$data['title']}}</td>
                            <td><img src="{{asset('assets/images/'.$data->image)}}" alt=""></td>
                            <td>{{$data['description']}}</td>
                            <td>{{$data['video_url']}}</td>
                            <td><?php echo $data['status'] == 0 ? "De-active":"Active" ?></td>
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_mock_bank',$data['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_mock_bank',$data['id'])}}">Delete</a> 
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
        </div><br>
    </div>
@endsection