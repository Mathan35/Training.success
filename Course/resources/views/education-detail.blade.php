@extends('layouts.user.dashboard-header')
@section('content')
<div class="container">
    <div class="row card m-4">
        <div class="col-md-12 m-2">
            <!-- Messages -->
            <x-Message-component/>

            <p><a class="text-decoration-none" href="{{route('home')}}">Home</a> <i class="bi bi-arrow-right-short"></i> Education Details</p>

            <h1 class="h4">Education Details :-</h1>
            @if ($GetEducation == null)
                
            <form action="{{route('ug-degree.store')}}" method="post" enctype = "multipart/form-data">
                @csrf
                <h1 class="h4">UG Degree <span>(Mandatory)</span> :-</h1>
                <x-degree-form-component/>
            </form>
            @else
            <div class="card mb-5">
                <div class="m-3">
                    <a href="{{route('ug-degree.edit',$GetEducation['id'])}}">
                        <h1 class="position-relative btn btn-outline-primary"><i class="bi bi-pencil-fill"></i></h1>
                    </a>
                    <h1 class="h4">UG Degree :-</h1>

                    <h1 class="h5 text-primary mt-3">Passed Out Year :- <span class="text-dark">{{$GetEducation['passed_out']}}</span></h1>
                    <h1 class="h5 text-primary mt-3">Studying Year :- <span class="text-dark">{{$GetEducation ['studying_year']}}</span></h1>
                    <h1 class="h5 text-primary mt-3">Degree :- <span class="text-dark">{{$GetEducation->degree->name}}</span></h1>
                    <h1 class="h5 text-primary mt-3">Specialization :- <span class="text-dark">{{$GetEducation->specialization->name}}</span></h1>
                    <h1 class="h5 text-primary mt-3">College :- <span class="text-dark">{{$GetEducation->college->name}}</span></h1>
                    <h1 class="h5 text-primary mt-3">Location :- <span class="text-dark">{{$GetEducation->college->location}}</span></h1>
                </div>
            </div>

            @endif

            @if ($GetPgEducation == null)
                
            <form action="{{route('pg-degree.store')}}" method="POST" enctype = "multipart/form-data">
                @csrf
                <h1 class="h4">PG Degree <span>(Optional)</span> :-</h1>
                <x-degree-form-component/>
            </form>
            @else
            <div class="card mb-5">
                <div class="m-3">
                    <a href="{{route('pg-degree.edit',$GetPgEducation['id'])}}">
                        <h1 class="position-relative btn btn-outline-primary"><i class="bi bi-pencil-fill"></i></h1>
                    </a>
                    <h1 class="h4">Pg Degree :-</h1>
                    <h1 class="h5 text-primary mt-3">Passed Out Year :- <span class="text-dark">{{$GetPgEducation['passed_out']}}</span></h1>
                    <h1 class="h5 text-primary mt-3">Studying Year :- <span class="text-dark">{{$GetPgEducation ['studying_year']}}</span></h1>
                    <h1 class="h5 text-primary mt-3">Degree :- <span class="text-dark">{{$GetPgEducation->degree->name}}</span></h1>
                    <h1 class="h5 text-primary mt-3">Specialization :- <span class="text-dark">{{$GetPgEducation->specialization->name}}</span></h1>
                    <h1 class="h5 text-primary mt-3">College :- <span class="text-dark">{{$GetPgEducation->college->name}}</span></h1>
                    <h1 class="h5 text-primary mt-3">Location :- <span class="text-dark">{{$GetPgEducation->college->location}}</span></h1>
                </div>
            </div>
         @endif

        </div>
    </div>
</div>

       
@endsection
