@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <p>Add Mock Bank Questions</p>
                <form action="{{route('create_mock_banks_question')}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <label for="name">Mock Bank Type</label>
                    <select name = "mock_bank_id" class=" mt-3 form-select" aria-label="Default select example">
                        @foreach($mock_bank as $data)
                        <option value = "{{$data['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>
                    <div class="form-group mt-2">
                        <label for="question">Question</label>
                        <input type="text" name = "question" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="option_1">Option 1</label>
                        <input type="text" name = "option_1" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="option_2">Option 2</label>
                        <input type="text" name = "option_2" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="option_3">Option 3</label>
                        <input type="text" name = "option_3" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="option_4">Option 4</label>
                        <input type="text" name = "option_4" class="form-control" id="" >
                    </div>
    
                    <div class="form-group mt-2">
                        <label for="correct_answer">Correct Answer</label>
                        <input type="text" name = "correct_answer" class="form-control" id="correct_answer" >
                    </div>
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>

            <div class = "table-content mx-5 mt-3">
                <p>List of Mock bank Questions</p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mock Bank</th>
                            <th scope="col">Questions</th>
                            <th scope="col">Option 1</th>
                            <th scope="col">Option 2</th>
                            <th scope="col">Option 3</th>
                            <th scope="col">Option 4</th>
                            <th scope="col">Correct answer</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mock_bank_question as $data)
                        <tr>
                            <th scope="row">{{$data['id']}}</th>
                            <td>{{$data->getMockBank->title}}</td>
                            <td>{{$data['question']}}</td>
                            <td>{{$data['option_1']}}</td>
                            <td>{{$data['option_2']}}</td>
                            <td>{{$data['option_3']}}</td>
                            <td>{{$data['option_4']}}</td>
                            <td>{{$data['correct_answer']}}</td>
                            <td>
                                <a class = "text-decoration-none" href="{{route('edit_mock_banks_question',$data['id'])}}">Edit</a> 
                                <a class = "text-decoration-none text-danger" href="{{route('delete_mock_banks_question',$data['id'])}}">Delete</a> 
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