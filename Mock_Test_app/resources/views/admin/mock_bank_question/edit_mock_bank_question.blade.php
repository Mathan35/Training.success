@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
                <a class = "text-decoration-none" href="{{route('mock_banks_questions')}}">Back</a>
                <p>Update Mock Bank Questions</p>
                <form action="{{route('update_mock_banks_question',$mock_data->id)}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <label for="name">Mock Bank Type</label>
                    <select name = "mock_bank_id" class=" mt-3 form-select" aria-label="Default select example">
                    <option selected value = "{{$mock_data->getMockBank->id}}" >{{$mock_data->getMockBank->title}}</option>
                        @foreach($mock_bank as $value)
                        <option value = "{{$value['id']}}" >{{$value['title']}}</option>
                        @endforeach
                    </select>
                    <div class="form-group mt-2">
                        <label for="question">Question</label>
                        <input type="text" value = "{{$mock_data->question}}" name = "question" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="option_1">Option 1</label>
                        <input type="text" value = "{{$mock_data->option_1}}" name = "option_1" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="option_2">Option 2</label>
                        <input type="text" value = "{{$mock_data->option_2}}" name = "option_2" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="option_3">Option 3</label>
                        <input type="text" value = "{{$mock_data->option_3}}" name = "option_3" class="form-control" id="" >
                    </div>
                    <div class="form-group mt-2">
                        <label for="option_4">Option 4</label>
                        <input type="text" value = "{{$mock_data->option_4}}" name = "option_4" class="form-control" id="" >
                    </div>
    
                    <div class="form-group mt-2">
                        <label for="correct_answer">Correct Answer</label>
                        <input type="text" value = "{{$mock_data->correct_answer}}" name = "correct_answer" class="form-control" id="correct_answer" >
                    </div>
                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection