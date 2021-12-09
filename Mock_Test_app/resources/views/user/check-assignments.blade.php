<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        @forelse($get_assignment as $data)
        <div class = "card assignment-content">
            <div class = "assignment-body">
                <p class = "border p-1">Status : <span class = "font-weight-bold tetx-right text-success"><?php echo $data->getSubmittedAssignment->status=="0"? "Not Viewed":$data->getSubmittedAssignment->status ?></span></p>
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
    <br>
</x-app-layout>
