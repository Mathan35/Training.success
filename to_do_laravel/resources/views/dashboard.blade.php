<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class = "mt-5 ml-4">
                  <p>Welcome {{$user_name->name}}.....!</p>
               <h1 class = "mt-5 ml-5">Task Application</h1>

               <form action="createTask" method="post">
               @csrf
               <label for="task_name"></label>
               <input type="text" name="task_name" id="">

               @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
               @endif
                            <br>
               <span class = "border">
               <button class = "p-2" type="submit">Submit</button>
               </span>

               </form>
              </div>

              <div class = "mt-5 ml-4">

              <h4>Task Lists</h4>

                <table class="table">
                <thead>
                    <tr>
                    <th scope="col ml-5">#</th>
                    <th scope="col ml-5">Task Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                    <th scope="row">{{$task['id']}}</th>
                    <td>{{$task['task_name']}}</td>
                    <td><a href="deleteTask/{{$task['id']}}">Delete</a></td>
                    </tr>
                    @endforeach
                
                </tbody>
                </table>

              </div>
            </div>
        </div>
    </div>
</x-app-layout>
