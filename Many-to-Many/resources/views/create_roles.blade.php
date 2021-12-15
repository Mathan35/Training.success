@extends('layouts.header')
@section('content')
   <div class="container">
        <div class="row shadow mt-5">
            <x-error-component/>
            <h1 class = "mt-4 text-center">Create User with Roles</h1>
            <div>
                <a href="{{route('view_roles')}}">View Roles</a>
            </div>
            <form action="{{route('create_roles')}}" method="post">
                @csrf
                <div class="offset-md-2 col-md-8 mt-5">
                    <select class="form-select" name = "role_id" aria-label="Default select example">
                        @foreach($getRoles as $role)
                        <option value="{{$role['id']}}">{{$role['title']}}</option>
                        @endforeach
                    </select>

                    <div>
                        @foreach($getUsers as $user)
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name = "user[]" value="{{$user['id']}}" id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">
                                {{$user['name']}}
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
