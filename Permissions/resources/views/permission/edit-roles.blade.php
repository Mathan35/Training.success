@extends('layouts.header')
@section('content')

            <div class="col-md-9 ml-3 card">
            <a class = "text-decoration-none m-3"  href="{{route('view-roles')}}">View roles</a>
            <a class = "text-decoration-none m-3"  href="{{route('view-roles-permissions')}}">View Role and Permissions</a>

                @include('layouts.messages')
                <h1 class = "m-3">Create Roles :-</h1>
                <div>
                    <form action="{{route('update-roles',$role->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role Name </label>
                            <input type="text" name = "name" value = "{{$role->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Role Name">
                        </div>
                        <div class = "mt-3 mb-3">
                            @foreach ($getPermissions as $permission)
                            @if(in_array($permission->id, $checkedPermissions))
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="permission_id[]" value="{{$permission->id}}" checked id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$permission->name}}</label>
                            </div>
                            @else
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="permission_id[]" value="{{$permission->id}}"  id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$permission->name}}</label>
                            </div>
                            @endif
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