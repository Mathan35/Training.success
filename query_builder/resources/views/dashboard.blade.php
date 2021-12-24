<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<br><br>
   <div class="container shadow mt-5 rounded">
       <div class="row text-center  m-4 ">
           <div class="col-md-4">
               <h1 class="text-light bg-primary p-2 mt-4 mb-4 rounded">
                   <a class="text-decoration-none text-light" href="{{route('organization')}}">Organizations</a>
               </h1>
            </div>
            <div class="col-md-4">
                <h1 class="text-light p-2 bg-primary mt-4 mb-4 rounded">
                    <a class="text-decoration-none text-light"  href="{{route('workspace')}}">Workspaces</a>
                </h1>
            </div>
            <div class="col-md-4">
                <h1 class="text-light p-2 bg-primary mt-4 mb-4 rounded">
                    <a class="text-decoration-none text-light"  href="{{route('role')}}">Roles</a>
                </h1>
            </div>
        </div>

        <div class="row text-center  m-4">
            <div class="col-md-4">
                <h1 class="text-light bg-primary p-2 mt-4 mb-4 rounded">
                    <a class="text-decoration-none text-light" href="{{route('project')}}">Projects</a>
                </h1>
             </div>
             <div class="col-md-4">
                 <h1 class="text-light p-2 bg-primary mt-4 mb-4 rounded">
                     <a class="text-decoration-none text-light"  href="{{route('task')}}">Task</a>
                 </h1>
             </div>
             <div class="col-md-4">
                 <h1 class="text-light p-2 bg-primary mt-4 mb-4 rounded">
                     <a class="text-decoration-none text-light"  href="{{route('user')}}">Users</a>
                 </h1>
             </div>
        </div>
   </div>
</x-app-layout>
