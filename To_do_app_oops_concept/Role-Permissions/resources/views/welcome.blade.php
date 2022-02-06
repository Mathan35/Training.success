@extends('layouts.header')
@section('content')
            @auth
                <div class="col-md-9 ml-3">
                    @include('layouts.messages')
                    <div>
                    @can('create-post')
                        <a class = "link text-decoration-none" href = "">create post</a>
                    @endcan
                    @can('edit-post')
                        <a class = "link text-decoration-none" href = "">edit post</a>
                    @endcan
                    @can('delete-post')
                        <a class = "link text-decoration-none" href = "">delete post</a>
                    @endcan
                    @can('update-post')
                        <a class = "link text-decoration-none" href = "">update post</a>
                    @endcan
                    @can('destroy-post')
                        <a class = "link text-decoration-none" href = "">destroy post</a>
                    @endcan





                    <div class = "mt-5">
                        <a href="{{route('test-gate-1')}}">test-gate-1</a>
                    </div>
                    <div>
                    <a href="{{route('test-gate-2')}}">test-gate-2</a>
                    </div>
                    </div>
                </div>
            @endauth

       
        </div>
    </div>
</div>
@endsection

