@extends('layouts.header')
@section('content')
            @auth
                <div class="col-md-9 ml-3">
                    <div>
                    @if(!empty($collection) && (in_array("create post", $collection)))
                    <a class = "link text-decoration-none" href = "">create post</a>
                    @endif
                    @if(!empty($collection) && (in_array("delete post", $collection)))
                    <a class = "link text-decoration-none" href = "">delete post</a>
                    @endif

                    @if(!empty($collection) && (in_array("edit post", $collection)))
                    <a class = "link text-decoration-none" href = "">edit post</a>
                    @endif

                    @if(!empty($collection) && (in_array("update post", $collection)))
                    <a class = "link text-decoration-none" href = "">update post</a>
                    @endif

                    @if(!empty($collection) &&  (in_array("destroy post", $collection)))
                    <a class = "link text-decoration-none" href = "">destroy post</a>
                    @endif

                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection

