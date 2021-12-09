
@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5">
            <a class = "text-decoration-none" href="{{route('tags_banks')}}">Back</a>
                <p>Update Tags Bank</p>
                <form action="{{route('update_tag_bank',$tag_bank['id'])}}" method="post" enctype = "multipart/form-data">
                    @csrf
                    <label for="name">Tag type</label>
                    <select name = "tag_id" class=" mt-3 form-select" aria-label="Default select example">
                    <option selected value = "{{$tag_bank->getTag->id}}" >{{$tag_bank->getTag->name}}</option>
                        @foreach($tags as $value)
                        <option value = "{{$value['id']}}" >{{$value['name']}}</option>
                        @endforeach
                    </select>

                    <label for="name">Mock Bank Type</label>
                    <select name = "mock_bank_id" class=" mt-3 form-select" aria-label="Default select example">
                    <option selected value = "{{$tag_bank->getMockBank->id}}" >{{$tag_bank->getMockBank->title}}</option>
                        @foreach($mock_bank as $data)
                        <option value = "{{$value['id']}}" >{{$data['title']}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="mb-5 mt-3 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection