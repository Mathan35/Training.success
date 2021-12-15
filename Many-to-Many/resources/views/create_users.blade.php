@extends('layouts.header')
@section('content')
   <div class="container">
        <div class="row shadow mt-5">
            <x-error-component/>
            <h1 class = "mt-4 text-center">Create User with Roles</h1>
            <div>
                <a href="{{route('view_users')}}">View Users</a>
            </div>
            <form action="{{route('create_users')}}" method="post">
                @csrf
                <div class="offset-md-2 col-md-8 mt-5">
                    <select class="form-select" name = "user_id" aria-label="Default select example">
                        @foreach($getUsers as $user)
                        <option value="{{$user['id']}}">{{$user['name']}}</option>
                        @endforeach
                    </select>

                    <div>
                        @foreach($getRoles as $role)
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name = "role[]" value="{{$role['id']}}" id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">
                                {{$role['title']}}
                            </label>
                        </div>
                        @endforeach
                    </div><br>
                    <button class = "btn btn-primary mt-3 mb-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
