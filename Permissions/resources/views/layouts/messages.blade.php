{{--validation errors--}}
@if ($errors->any())
    <div class="alert alert-danger m-4 ">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

{{--success message--}}
@if(session('message'))
    <div class="alert alert-success m-4 ">
        {{session('message')}}
    </div>
@endif