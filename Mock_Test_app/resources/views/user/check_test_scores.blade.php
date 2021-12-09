<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
       <div class = "submit-content">
           <h1>Test Scores..</h1>
           @include('layouts.error-message')   
           @include('layouts.validation')  
           <div class = "card mt-4">
               <div class = "submit-body">
                    <label for="name">Your Mock Test scores</label>
                    <div class = "table-content mx-5 mt-3">
                        <p>List of Assignments</p>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Test Title</th>
                                    <th scope="col">Scores</th>
                                    <th scope="col">Submitted Date</th>
                                    <th scope="col">Submitted Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($test_result as $data)
                                <tr>
                                    <th scope="row">{{$data->getMockExam->title}}</th>
                                    <td>{{$data['score']}}</td>
                                    <td>{{ $data->created_at->format('d,'.' F'.' y') }}</td>
                                    <td>{{ $data->created_at->format('H:i') }}</td>
                                </tr>
                                @empty
                                <p>
                                    No data found
                                </p>
                                @endforelse
                            </tbody>
                        </table><br>
                    </div>
               </div>
           </div>
       </div>
    </div>
</x-app-layout>
