<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('project')}}">View Projects</a>
    </x-slot>
<br><br>
   <div class="container shadow mt-5  rounded">
       <div class="row  m-5">
           <div class="col-md-12 mt-5 mb-5">
                <h1 class="h6 border p-2 text-primary" >Status : <span class="text-success"> {{$Project['status'] == 1? 'Completed':'Processing'}}</span></h1>
                <h1 class="h3 text-primary">Project Name : <span class="text-dark"> {{$Project['name']}}</span></h1>
                <div class="">

                    <p class="h4 mt-2 text-primary">Tasks list :-</p>
                    @forelse ($Project->tasks as $item)
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            <li><span class="text-dark h5"> {{$item['name']}}</span></li>
                        </div>
                    </div>
                    @empty
                        Not Found..!
                    @endforelse


                    <p class="h4 mt-2 text-primary">Wokspace Name :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            <li><span class="text-dark h5"> {{$Project->workspace->name}}</span></li>
                        </div>
                    </div>
                

                    <p class="h4 mt-2 text-primary">Organization Name :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            <li><span class="text-dark h5"> {{$Project->organization->name}}</span></li>
                        </div>
                    </div>

                </div>
           </div>
       </div>
   </div>
</x-app-layout>
