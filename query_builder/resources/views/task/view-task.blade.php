<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('task')}}">View Tasks</a>
    </x-slot>
<br><br>
   <div class="container shadow mt-5  rounded">
       <div class="row  m-5">
           <div class="col-md-12 mt-5 mb-5">
               <h1 class="h3 text-primary" >Task Name : <span class="text-dark"> {{$Task['name']}}</span></h1>
                <div class="">

                    <p class="h4 mt-2 text-primary">Project Name :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            <li><span class="text-dark h5"> {{$Task->project->name}}</span></li>
                        </div>
                    </div>
                

                    <p class="h4 mt-2 text-primary">Workspace Name :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            <li><span class="text-dark h5"> {{$Task->project->workspace->name}}</span></li>
                        </div>
                    </div>


                    <p class="h4 mt-2 text-primary">Organization Name :-</p>
                    <div class=" rounded mt-2">
                        <div class="mt-3">
                            <li><span class="text-dark h5"> {{$Task->project->organization->name}}</span></li>
                        </div>
                    </div>

                </div>
           </div>
       </div>
   </div>
</x-app-layout>
