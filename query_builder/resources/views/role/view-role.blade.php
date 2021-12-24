<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('role')}}">View Role</a>
    </x-slot>
<br><br>
   <div class="container shadow mt-5  rounded">
       <div class="row  m-5">
           <div class="col-md-12 mt-5 mb-5">
               <h1 class="h3 text-primary">Role Name : <span class="text-dark"> {{$Role['name']}}</span></h1>
                <div class="">
                    <div class="border rounded mt-2">
                        <h1 class="h4 m-3 text-primary">Permissions :- </h1>
                        @forelse ($Role->permissions as $item)
                            <div class="m-3">
                               <li>{{$item->name}}</li>
                            </div>
                        @empty
                            Not Found..!
                        @endforelse

                        <h1 class="h4 m-3 text-primary">Organization :- </h1>
                        <div class="m-3">
                            <li >{{$Role->Organizations->name}}</li>
                         </div>

                    </div>
                </div>
           </div>
       </div>
   </div>
</x-app-layout>
$Role->organizations