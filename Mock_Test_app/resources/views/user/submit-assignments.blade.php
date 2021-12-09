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
               <div class = "submit-body">
                    <label for="name">Your Assignment</label>
                    <form action="{{route('create_submission')}}" method="post">
                        @csrf
                        <select name = "assignment_id" class=" mt-3 form-select" aria-label="Default select example">
                            @foreach($get_assignment as $data)
                            <option value = "{{$data->getAssignment->id}}" >{{$data->getAssignment->title}}</option>
                            @endforeach
                        </select>
                        <div class="form-group mt-2">
                            <label for="github_url">Github URL</label>
                            <input type="text" name = "github_url" class="form-control" id="" >
                        </div>
                        <div class="form-group mt-2">
                            <label for="output_url">Output URL</label>
                            <input type="text" name = "output_url" class="form-control" id="" >
                        </div>
                        <button class = "btn btn-primary mt-4" type="submit">Submit</button>
                    </form>
               </div>
           </div>
       </div>
    </div>
</x-app-layout>
