<x-app-layout>
    <x-slot name="header">
        @can('check-Admin')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>       
        @endcan
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Internal Users') }}
        </h2>
    </x-slot>

   <div class="container-fluid">
       <div class="row header">
           @include('layouts.admin-header')
           <div class="col-md-9 card ">
           {{--- <a class = "text-decoration-none m-3"  href="{{route('view-roles')}}">View roles</a>
            <a class = "text-decoration-none m-3"  href="{{route('view-roles-permissions')}}">View Role and Permissions</a>  ---}}

                @include('layouts.messages')
                <h1 class = "m-3">Create User :-</h1>
                <div>
                    <form action="{{route('create-internal-user')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name </label>
                            <input type="text" name = "name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password </label>
                            <input type="password" name = "password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
                        </div>
                        <div class = "mt-3 mb-3">
                            <label for="exampleInputEmail1">Organization </label>
                            <select class="form-select"  name = "organization_id" aria-label="Default select example">
                                @foreach ($getOrganization as $organization)
                                <option value="{{$organization->id}}" aria>{{$organization->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class = "mt-3 mb-3">
                            <label for="exampleInputEmail1">Role </label>
                            <select class="form-select"  name = "role_id" aria-label="Default select example">
                                @foreach ($getRole as $role)
                                <option value="{{$role->id}}" aria>{{$role->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <button class = "text-dark btn btn-primary mt-3 mb-4" type="submit">Submit</button>
                    </form>
                </div>
           </div>
       </div>
   </div>
</x-app-layout>
