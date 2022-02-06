@extends('layouts.header')
@section('content')

            <div class="col-md-9 ml-3 card">
            <a class = "text-decoration-none m-3"  href="{{route('view-roles')}}">View roles</a>
            <a class = "text-decoration-none m-3"  href="{{route('view-roles-permissions')}}">View Role and Permissions</a>

                @include('layouts.messages')
                <h1 class = "m-3">Create Roles :-</h1>
                <div>
                    <form action="{{route('create-roles')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role Name </label>
                            <input type="text" name = "name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Role Name">
                        </div>
                        <div class = "mt-3 mb-3">
                            @foreach ($getPermission as $permission)
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="permission_id[]" value="{{$permission->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$permission->name}}</label>
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