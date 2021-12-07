<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   <div class="container-fluid">
       <div class="row m-3 mt-5">
           <div class="col-md-2  menu shadow">
          {{--side menu--}}
          @include('layouts.side-menu')
           </div>
           <div class="dashboard-content col-md-8 m-4 ">
              <h4>Number of Technologies <span>{{$technology}}</span> </h4>
              <h4>Number of Quizes <span>{{$quiz}}</span></h4>
              <h4>Total Number of Questions <span>{{$questions}}</span></h4>
          </div>
       </div>
   </div>
</x-app-layout>
