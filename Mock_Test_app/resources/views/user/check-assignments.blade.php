<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-9">

                @forelse($get_assignment as $data)
                <div class = "card assignment-content">
                    <div class = "assignment-body">
                        <p>{{ $data->created_at->format('d,'.' F'.' y') }}</p>
                        <h1>{{$data->getAssignment->title}}</h1>
                        <p>{{$data->getAssignment->description}}</p>
                        <img src="{{asset('assets/images/'.$data->getAssignment->image)}}" alt="">
                        <p class = "mt-4">Assignment Duration : {{$data->getAssignment->duration}}</p>
                        <div>
                            <h1>Reference Images</h1>
                            <div class = "more-images">
                                @foreach($data->getAssignment->getImages as $image)
                                    <img  class = "mr-3" src="{{asset('assets/images/'.$image->image)}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class = "mt-5 text-center">No assignments found for you...</p>
                @endforelse
            </div>
            <div class="col-md-3">
                <div class="card mt-4">
                        <div class = "m-3 ">
                           <h1 class = "text-primary">Assignment Status :-</h1>
                            @foreach($get_assignment_status as $value)
                            <div class = "card mt-3">
                                <div class = "m-2">
                                    <p>{{$value->getAssignment->title}}</p>
                                    <p><scan class = "text-success"> {{$value->status}}</scan> ({{ $value->created_at->format('d,'.' F'.' y '.', H:i') }})</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</x-app-layout>
