@extends('layouts.header')
@section('content')

            <div class="col-md-9 ml-3 card">
                @include('layouts.messages')
                <a class = "text-decoration-none m-3"  href="{{route('view-users-roles')}}">View users and Roles</a>

                <h1 class = "m-3">Create Users :-</h1>
                <div>
                    <form action="{{route('create-users')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name </label>
                            <input type="text" name = "name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password </label>
                            <input type="password" name = "password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
                        </div>
                       
                        <div class = "mt-3 mb-3">
                            @foreach ($getRoles as $value)
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="role_id[]" value="{{$value->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$value->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        <button class = "btn btn-primary mt-3 mb-4" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection