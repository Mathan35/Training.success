<x-app-layout>
    <x-slot name="header">
        @can('check-Admin')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>       
        @endcan

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organization') }}
        </h2>
    </x-slot>

   <div class="container-fluid">
       <div class="row header">
           @include('layouts.admin-header')
           <div class="col-md-9 card ">
           {{--- <a class = "text-decoration-none m-3"  href="{{route('view-roles')}}">View roles</a>
            <a class = "text-decoration-none m-3"  href="{{route('view-roles-permissions')}}">View Role and Permissions</a>  ---}}

                @include('layouts.messages')
                <a href="{{route('view-organization')}}" class="m-3 text-primary" >View Organization</a>

                <h1 class = "m-3">Update Organization :-</h1>
                <div>
                    <form action="{{route('update-organization',$findOrganization->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name </label>
                            <input type="text" name = "user_name" value="{{$findUser->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                            <input type="text" hidden name = "user_id" value="{{$findUser->id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="email" name = "email" value="{{$findUser->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password </label>
                            <input type="password" name = "password" class="form-control" value="{{Hash::make($findUser->password)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Organization Name </label>
                            <input type="text" name = "name" value="{{$findOrganization->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Organization Name">
                        </div>

                        <div class = "mt-3 mb-3">
                            <select class="form-select"  name = "role_id" aria-label="Default select example">
                                @foreach ($getRole as $role)
                                <option value="{{$role->id}}" {{$role->id == $checkedRole['role_id'] ? 'selected':''}} aria>{{$role->name}}</option>
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
