<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   <div class="container-fluid">
       <div class="row m-3 mt-5">
           <div class="col-md-2  menu shadow">
          {{--side menu--}}
          @include('layouts.side-menu')
           </div>
            <div class="col-md-10 ">

                <div class="card  ml-5">
                   
                   {{--success message--}}
                   @if(session('success'))
                   <div class="alert alert-success m-4 ">
                      {{session('success')}}
                    </div>
                    @endif
                    
                    {{--validation errors--}}
                    @if ($errors->any())
                    <div class="alert alert-danger m-4 ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                  
                    <div class = "home ml-4 mt-3">
                       <a class = "text-primary" href="/">Home</a>
                    </div>

                   <h1 class = "mx-4 ">Add Questions</h1>

                   <div class = "form mx-4">
                       <form class = "form-quiz" action="createQuestion" method="post" enctype = "multipart/form-data">
                        @csrf
                        <label for="question">Question</label><br>
                        <input class="form-control" type="text" name="question" id=""><br>
                        <label for="option_1">Option 1</label><br>
                        <input class="form-control"  type="text" name="option_1" id=""><br>
                        <label for="option_2">Option 2</label><br>
                        <input class="form-control"  type="text" name="option_2" id=""><br>
                        <label for="option_3">Option 3</label><br>
                        <input class="form-control"  type="text" name="option_3" id=""><br>
                        <label for="option_4">Option 4</label><br>
                        <input  class="form-select" type="text" name="option_4" id=""><br>
                        <label for="correct_answer">Correct Answer</label><br>
                        <input class="form-control"  type="text" name="correct_answer" id=""><br>
                        
                        <label for="quiz_type">Quiz Type</label><br>
                         <select class="form-select" name = "quiz_id" aria-label="Default select example">
                        @foreach($quiz as $data)
                        <option value = "{{$data['id']}}">{{$data['name']}}</option>
                        @endforeach
                        </select>
                     
                        <button class = "btn btn-primary mt-4" type="submit">Submit</button>
                        </form>
                    </div>
                    <h1 class = "ml-5">Questions:-</h1>

                    <div class = "list mx-5 mb-5">
                        <table class="table">
                           <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">Options</th>
                                <th scope="col">Correct Answer</th>
                                <th scope="col">Delete</th>
                            </tr>
                          </thead>
                            <tbody>
                                @forelse($question as $value)
                                <tr>
                                    <th scope="row">{{$value['id']}}</th>
                                    <td>{{$value['question']}}</td>
                                    <td>
                                    {{$value['option_1']}} <br>
                                    {{$value['option_2']}} <br>
                                    {{$value['option_3']}} <br>
                                    {{$value['option_4']}} <br>

                                    </td>
                                    <td>{{$value['correct_answer']}}</td>
                                    <td><a class = "text-danger" href="deleteTechnology/{{$value['id']}}">Delete</a></td>
                                </tr>
                                @empty
                                <p>No data found</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
           </div>
       </div>
   </div>
</x-app-layout>
