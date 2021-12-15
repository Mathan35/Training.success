<div>
    {{--success message--}}
    @if(session('message'))
    <div class="alert alert-success m-4 ">
        {{session('message')}}
    </div>
    @endif
</div>