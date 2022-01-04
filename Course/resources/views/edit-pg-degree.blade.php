@extends('layouts.user.dashboard-header')
@section('content')
<div class="container">
    <div class="row card m-4">
        <div class="col-md-12 m-2">
            <!-- Messages -->
            <x-Message-component/> 
            <p><a class="text-decoration-none" href="{{route('home')}}">Home</a> <i class="bi bi-arrow-right-short"></i><a class="text-decoration-none" href="{{route('education-detail')}}">Education Details</a> <i class="bi bi-arrow-right-short"></i> Edit Pg Degree</p>

            <h1 class="h4">Education Details :-</h1>
            <form action="{{route('pg-degree.update',$GetDegree->id)}}" method="POST" enctype = "multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <h1 class="h4">Update PG Degree :-</h1>
                <div class="form-group">
                    <label for="">Passed Out Year</label>
                    <input type="text" name="passed_out" class="form-control" id="" value="{{$GetDegree->passed_out}}" aria-describedby="" placeholder="Optional">
                </div>
                <div class="form-group">
                    <label for="">Studying Year</label>
                    <input type="text" name="studying_year" class="form-control" value="{{$GetDegree->studying_year}}" id="" aria-describedby="" placeholder="Optional">
                </div>

                <div class="form-group">
                    <label for="">Degree</label>
                    <input type="text" hidden name="degree_id" class="form-control" id="" value="{{$GetDegree->degree->id}}" aria-describedby="" placeholder="">
                    <input type="text" name="degree" class="form-control" id="" value="{{$GetDegree->degree->name}}" aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="degree_image"  class="form-control" id="" value="{{$GetDegree->degree->image}}" aria-describedby="" placeholder="">
                </div>
                <img height="100" src="{{asset('assets/images/'.$GetDegree->degree->image)}}" alt="">


                <div class="form-group">
                    <label for="">Specializtion</label>
                    <input type="text" hidden name="specialization_id" class="form-control" id="" value="{{$GetDegree->specialization->id}}" aria-describedby="" placeholder="">
                    <input type="text" name="specializtion" class="form-control" id="" value="{{$GetDegree->specialization->name}}" aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="specialization_image"  class="form-control" value="{{$GetDegree->specialization->image}}" id="" aria-describedby="" placeholder="">
                </div>
                <img height="100" src="{{asset('assets/images/'.$GetDegree->specialization->image)}}" alt="">


                <div class="form-group">
                    <label for="">College</label>
                    <input type="text" hidden name="college_id" class="form-control" id="" value="{{$GetDegree->college->id}}" aria-describedby="" placeholder="">
                    <input type="text" name="college" class="form-control" id="" value="{{$GetDegree->college->name}}" aria-describedby="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="college_image"  class="form-control" id=""  value="{{$GetDegree->college->image}}" aria-describedby="" placeholder="">
                </div>
                <img height="100" src="{{asset('assets/images/'.$GetDegree->college->image)}}" alt="">

                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" class="form-control" id="" value="{{$GetDegree->college->location}}" aria-describedby="" placeholder="">
                </div>

                <button type="submit" class="btn btn-primary mt-4 mb-4">Update</button>
            </form>
           

        </div>
    </div>
</div>

       
@endsection
