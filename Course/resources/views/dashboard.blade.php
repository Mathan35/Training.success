@extends('layouts.user.dashboard-header')
@section('content')

<div class="container mt-5">

    <p><a class="text-decoration-none" href="{{route('home')}}">Home</a> <i class="bi bi-arrow-right-short"></i> Dashboard</p>

    <div class="row card m-4">
        <div class="col-md-12 m-2">
            <h1 class="bg-primary rounded mt-2 h5 text-center p-2"><a href="{{ route('view-enquiry') }}" class=" text-decoration-none  text-light   p-2">Previous Enquiries</a></h1>
            <h1 class="bg-primary rounded mt-2 h5 text-center p-2"><a href="{{ route('education-detail') }}" class=" text-decoration-none  text-light  p-2">Education Details</a></h1>
        </div>
    </div>
</div>

@endsection
