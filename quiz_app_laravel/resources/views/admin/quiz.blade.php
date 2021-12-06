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
                       <form class = "form-quiz" action="createQuiz" method="post" enctype = "multipart/form-data">
                        @csrf
                            <label for="name">Name</label><br>
                            <input class="form-control" type="text" name="name" id=""><br>
                            <label for="name">Image</label><br>
                            <input type="file" name="image" id=""><br>
                            <label for="exampleFormControlTextarea1">Description</label><br>
                            <textarea class="form-control" name = "description" id="exampleFormControlTextarea1" rows="3"></textarea><br>
                            <button class = "btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                    <h1 class = "ml-5">Technologies Lists:-</h1>

                    <div class = "list mx-5 mb-5">
                        <table class="table">
                           <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Technology</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                                @forelse($quiz as $value)
                                <tr>
                                    <th scope="row">{{$value['id']}}</th>
                                    <td>{{$value['name']}}</td>
                                    <td><img src="{{asset('assets/images/'.$value['image'])}}" alt=""></td>
                                    <td>{{$value['description']}}</td>
                                    <td><a class = "text-danger" href="deleteQuiz/{{$value['id']}}">Delete</a></td>
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
