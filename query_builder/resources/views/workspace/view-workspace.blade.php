<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('workspace')}}">View Workspace</a>
    </x-slot>
<br><br>
   <div class="container shadow mt-5  rounded">
       <div class="row  m-5">
           <div class="col-md-12 mt-5 mb-5">
               <h1 class="h3 text-primary">Workspace Name : <span class="text-dark"> {{$workspace['name']}}</span></h1>
                <div class="">
                        @forelse ($workspace->projects as $item)
                        <div class=" rounded mt-2">
                            <div class="mt-3">
                                <p class="h4 mt-2 text-primary" >Project Name :- <span class="text-dark h5"> {{$item['name']}}</span></p>
                                <p class="h4 mt-2 text-primary" >Tasks list :-</p>
                                @foreach ($item->tasks as $value)
                                <li><span class="text-dark h5"> {{$value['name']}}</span></li>
                                @endforeach
                            </div>
                        </div>
                        @empty
                            Not Found..!
                        @endforelse

                </div>
           </div>
       </div>
   </div>
</x-app-layout>
