<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('dashboard')}}">Back</a>
    </x-slot>
<br><br>
   <div class="container shadow mt-5  rounded">
       <div class="row  m-5">
           <div class="col-md-12 mt-5 mb-5">
               <h1 class="text-primary h3">List of Projects</h1>

               <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Project as $item)              
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><a class="text-primary"  href="{{route('view-project', $item->id)}}">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
           </div>
       </div>
   </div>
</x-app-layout>
