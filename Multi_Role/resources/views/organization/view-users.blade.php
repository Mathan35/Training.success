<x-app-layout>
    <x-slot name="header">
        @can('check-Admin')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>       
        @else
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$organization}}
        </h2>      
        @endcan
    </x-slot>

   <div class="container-fluid">
       <div class="row header">
           @include('layouts.admin-header')
           <div class="col-md-9 card ">
           {{--- <a class = "text-decoration-none m-3"  href="{{route('view-roles')}}">View roles</a>
            <a class = "text-decoration-none m-3"  href="{{route('view-roles-permissions')}}">View Role and Permissions</a>  ---}}

                @include('layouts.messages')
                <h1 class = "m-3">List of Users :-</h1>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $data)
                            <tr>
                            <th scope="row">1</th>
                            <td>{{$data->name}}</td>
                                  
                            <td><a class = "text-decoration-none" href="{{route('edit-user', $data->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
           </div>
       </div>
   </div>
</x-app-layout>
