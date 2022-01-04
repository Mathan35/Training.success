@extends('layouts.user.dashboard-header')
@section('content')
<div class="container ">

    <p class="ml-3 mt-4"><a class="text-decoration-none" href="{{route('home')}}">Home</a> <i class="bi bi-arrow-right-short"></i> View Course</p>

    <!-- Messages -->
    <x-Message-component/> 


    <h1 class="text-center mt-4">Course Details</h1>

    <div class="row card m-4 mt-5">
        <div class="col-md-12 m-2">

            <div class="d-flex m-2">
                <div>
                    <img height="180" width="230" src="{{asset('assets/images/'.$Course->image)}}" alt="">
                </div>
                <div class="ml-4">
                    <h1 class="h3 ml-5">{{$Course->name}}</h1>
                    <p class=" ml-5">{{$Course->detailed_description}}</p>
                    <p class=" ml-5 bold text-primary">Published Date :- {{$Course->created_at->format('d,'.' F'.' y') }}</p>
                    <p class=" ml-5">Price :- ${{$Course->price}}</p>
                    @if ($CheckEnquiry)                        
                    <p class="text-success  ml-5" >Enquiry Submitted</p>
                    @else
                    <button class="btn btn-outline-warning ml-5" ><a class="text-decoration-none text-dark" href="{{route('enquiry', $Course->id)}}"> Enquiry Now</a></button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row card m-4">
        <div class="col-md-12 m-2">
            <div class=" m-2">
                <h1 class="h3">What you 'll learn</h1>

                @foreach ($Course->Learning as $item)
                <p><i class="bi bi-check2"></i>{{$item->name}} </p>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row card m-4">
        <div class="col-md-12 m-2">
            <div class=" m-2">
                <h1 class="h3">Course Content</h1>

                
              <!-- Accordion without outline borders -->
              <div class="accordion accordion-flush" id="accordionFlushExample">
                  @foreach ($Course->CourseTitle as $item)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$item->id}}" aria-expanded="false" aria-controls="flush-collapse{{$item->id}}">
                      {{$item->title}}
                    </button>
                  </h2>
                  <div id="flush-collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"> 
                        @foreach ($item->CourseTitleDescription as $value)
                            {{$value->description}}
                        @endforeach
                    </div>
                  </div>
                </div>
                @endforeach
               
              </div><!-- End Accordion without outline borders -->
            </div>
        </div>
    </div>
</div>
<br><br>
       
@endsection
