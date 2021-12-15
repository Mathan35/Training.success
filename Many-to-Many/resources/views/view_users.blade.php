@extends('layouts.header')
@section('content')
   <div class="container">
        <div class="row shadow mt-5">
            <h1 class = "mt-4 text-center">View User with Roles</h1>
            <div>
                <a href="{{route('users')}}">Create Users</a>
            </div>
            
            <div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">user</th>
                        <th scope="col">Roles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                        <tr>
                        <th scope="row">1</th>
                        <td>{{$data->name}}</td>                
                        <td>
                            @foreach($data->roles as $value)
                            {{$value->title}}, ({{$value->created_at->format('d,'.' F'.' y'.' H:i') }}) ,
                            @endforeach
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
