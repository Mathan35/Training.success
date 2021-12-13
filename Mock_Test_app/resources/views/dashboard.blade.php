<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
    <h1 class = "back-home mt-4" ><a class = "text-primary" href="/">Home</a></h1>
        <div class = "header-title">
            <h1><a href="{{route('check_assignments')}}">Check Assignments</a></h1>
            <h1><a href="{{route('submit_assignments')}}">Submit Assignments</a></h1>
            <h1><a href="{{route('test_result')}}">Mock Test Scores</a></h1>
        </div>
    </div>
</x-app-layout>
