@extends('layouts.header')
@section('content')

            <div class="col-md-9 ml-3 card">
                <div class = "m-4">
                    <x-error-component/>
                    <a class = "text-decoration-none" href="{{route('roles')}}">Create Roles</a>
                    <h1 class = "mt-2 ">View Role with Permissions :-</h1>
                    <div class = "">
                        <table class="table ">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($role as $data)
                                <tr>
                                <th scope="row">1</th>
                                <td>{{$data->name}}</td>                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection