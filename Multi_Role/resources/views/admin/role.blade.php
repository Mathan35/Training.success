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
                <a href="{{route('Role.index')}}" class="m-3 text-primary" >View Role</a>
                <h1 class = "m-3">Create Roles :-</h1>
                <div>
                    <form action="{{route('Role.store')}}" method="POST">
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
                        <button class = "text-dark btn btn-primary mt-3 mb-4" type="submit">Submit</button>
                    </form>
                </div>
           </div>
       </div>
   </div>
</x-app-layout>
