<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
       <div class = "submit-content">
           <h1>Submit Your Assignments here..</h1>
           @include('layouts.error-message')   
           @include('layouts.validation')  
           <div class = "card mt-4">
               <div class = "result-body">
                   <h1>You Got <span>{{$result}} </span> Points</h1>
                   <a href="/">Back to Home</a>
               </div>
           </div>
       </div>
    </div>
</x-app-layout>
