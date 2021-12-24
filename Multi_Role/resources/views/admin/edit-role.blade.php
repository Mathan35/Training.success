<x-app-layout>
    <x-slot name="header">
        @can('check-Admin')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>       
        @endcan
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>

   <div class="container-fluid">
       <div class="row header">
           @include('layouts.admin-header')
           <div class="col-md-9 card ">
           {{--- <a class = "text-decoration-none m-3"  href="{{route('view-roles')}}">View roles</a>
            <a class = "text-decoration-none m-3"  href="{{route('view-roles-permissions')}}">View Role and Permissions</a>  ---}}

                @include('layouts.messages')
                <a href="{{route('Role.index')}}" class="m-3 text-primary">View Role</a>

                <h1 class = "m-3">Update Roles :-</h1>
                <div>

                    <form action="{{route('Role.update',$role->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                        <button class = "btn text-dark btn-primary mt-3 mb-4" type="submit">Submit</button>
                    </form>
                </div>
           </div>
       </div>
   </div>
</x-app-layout>
