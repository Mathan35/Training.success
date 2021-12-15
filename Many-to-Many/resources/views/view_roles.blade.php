@extends('layouts.header')
@section('content')
   <div class="container">
        <div class="row shadow mt-5">
            <h1 class = "mt-4 text-center">View User with Roles</h1>
            <div>
                <a href="{{route('roles')}}">Create Roles</a>
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
                        @foreach($role as $data)
                        <tr>
                        <th scope="row">1</th>
                        <td>{{$data->title}}</td>                
                        <td>
                            @foreach($data->user as $value)
                            {{$value->name}}, ({{$value->created_at}})
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
