<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('organization')}}">View Organization</a>
    </x-slot>
<br><br>
   <div class="container shadow mt-5  rounded">
       <div class="row  m-5">
           <div class="col-md-12 mt-5 mb-5">
                <h1 class="h6 border p-2 text-primary" >Status : <span class="text-success"> {{$organization['status'] == 1? 'Active':'In-Active'}}</span></h1>
                <h1 class="h3 text-primary">Organization Name : <span class="text-dark"> {{$organization['name']}}</span></h1>
                <div class="">
                    <h1 class="h3 mt-3 text-primary">Number of Workspace : <span class="text-dark"> {{$organization['workspaces_count']}}</span></h1>
                    <h1 class="h3 mt-3 text-primary">Projects && Number of  Tasks :- </h1>
                        @forelse ($organization->projects as $item)

                        <div class="border rounded mt-2">
                            <div class="m-2">
                                <p class="text-primary">Projects :- <span class="text-dark"> {{$item['name']}}</span></p>
                                <p class="text-primary">Tasks :- <span class="text-dark"> {{$item->tasks->count()}}</span></p>
                            </div>
                        </div>
                        @empty
                        <p class="text-danger">Not Found...!</p>
                        @endforelse

                    <h1 class="h3 mt-3 text-primary">Number of Roles : <span class="text-dark"> {{$organization['roles_count']}}</span></h1>
                    <h1 class="h3 mt-3 text-primary">Number of Users : <span class="text-dark"> {{$organization['users_count']}}</span></h1>
                </div>
           </div>
       </div>
   </div>
</x-app-layout>
