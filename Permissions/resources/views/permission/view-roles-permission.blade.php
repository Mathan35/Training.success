@extends('layouts.header')
@section('content')

            <div class="col-md-9 ml-3 card">
                <x-error-component/>
                <a class = "text-decoration-none m-3" href="{{route('roles')}}">Create Role and Permissions</a>
                <h1 class = "mt-2">View Role with Permissions :-</h1>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Permissions</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($role as $data)
                            <tr>
                            <th scope="row">1</th>
                            <td>{{$data->name}}</td>                
                            <td>
                                @foreach($data->permissions as $value)
                                {{$value->name}},
                                @endforeach
                            </td>
                            <td><a class = "text-decoration-none" href="{{route('edit-roles', $data->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection