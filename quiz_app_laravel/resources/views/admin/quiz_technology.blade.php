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

                <div class="card ml-5">
                   
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


                   <h1>Add Quiz</h1>

                   <div class = "form mx-4">
                       <form class = "form-quiz" action="createQuizTechnology" method="post" enctype = "multipart/form-data">
                        @csrf
                            <label for="technology">Technology</label><br>
                            <select class="form-select" name = "technology" aria-label="Default select example">
                            @foreach($technology as $data)
                            <option value = "{{$data['id']}}">{{$data['name']}}</option>
                            @endforeach
                            </select>

                            <label for="quiz">Quiz</label><br>
                            <select class="form-select" name = "quiz" aria-label="Default select example">
                            @foreach($quiz as $data)
                            <option value = "{{$data['id']}}">{{$data['name']}}</option>
                            @endforeach
                            </select>

                            <button class = "btn btn-primary mt-4" type="submit">Submit</button>
                        </form>
                    </div>
                    <h1 class = "ml-5">Technologies Lists:-</h1>

                    <div class = "list mx-5 mb-5">
                        <table class="table">
                           <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Quiz</th>
                                    <th scope="col">Technology</th>
                                    <th scope="col">Delete</th>
                                </tr>
                           </thead>
                           <tbody>
                                @foreach($getData as $value)
                                <tr>
                                   <td>{{$value->getQuiz->id}}</td>
                                    <td>{{$value->getQuiz->name}}</td>
                                    <td>{{$value->getTechnology->name}}</td>
                                    <td><a class = "text-danger" href="deleteQuiz/{{$value['id']}}">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
           </div>
       </div>
   </div>
</x-app-layout>
