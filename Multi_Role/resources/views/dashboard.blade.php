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
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   <div class="container-fluid">
       <div class="row header">
           @include('layouts.admin-header')
           <div class="col-md-8">

           </div>
       </div>
   </div>
</x-app-layout>
