<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('user')}}">View Users</a>
    </x-slot>
<br><br>
   <div class="container shadow mt-5  rounded">
       <div class="row  m-5">
           <div class="col-md-12 mt-5 mb-5">
               <h1 class="h3 text-primary">User Name : <span class="text-dark"> {{$User['name']}}</span></h1>
               <h1 class="h4 text-primary">Email : <span class="text-dark"> {{$User['email']}}</span></h1>
                <div class=" mt-4">

                    <p class="h4 mt-2 text-primary">Organization Name :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            @foreach ($User->organization as $item)
                            <li><span class="text-dark h5"> {{$item->name}}</span></li>
                            @endforeach
                        </div>
                    </div>

                    <p class="h4 mt-2 text-primary">Role Name :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            @foreach ($User->role->unique() as $value)
                            <li><span class="text-dark h5"> {{$value->name}}</span></li>
                            @endforeach
                        </div>
                    </div>
                
                    <p class="h4 mt-2 text-primary">Workspaces Name :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            @forelse ($User->workspace as $value)
                            <li><span class="text-dark h5"> {{$value->name}}</span></li>
                            @empty
                            <p class="text-danger">Not Found...!</p>
                            @endforelse
                        </div>
                    </div>

                    <p class="h4 mt-2 text-primary">Projects && Tasks :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            @forelse ($User->project as $value)
                                <h1><span class="text-primary h5"> {{$value->name}}</span></h1>
                                @foreach ($value->tasks as $item)
                                <li><span class="text-dark h5"> {{$item->name}}</span></li>
                                @endforeach
                            @empty
                            <p class="text-danger">Not Found...!</p>
                            @endforelse
                        </div>
                    </div>
            
                </div>
           </div>
       </div>
   </div>
</x-app-layout>
