<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class = "home"> <br>
                   <a href="/">Home</a>
                </div>
                <div class = "form ">

                    @if(session('success'))
                    {{session('success')}}
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="createNews" method="post" enctype = "multipart/form-data">
                         @csrf
                        <label for="title">Title</label> <br>
                        <input type="text" name="title" id="">
                        <br><br>

                        <label for="image">Image</label> <br>
                        <input type="file" name="image" id="">
                        <br><br>

                        <label for="description">Description</label> <br>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name = "description" rows="3"></textarea>
                        <br><br>

                        <button class = "button" type="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
