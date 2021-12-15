@extends('layouts.header')
@section('content')

            <div class="col-md-9 ml-3 card">
                @include('layouts.messages')
                <a class = "text-decoration-none m-3"  href="{{route('view-users-roles')}}">View user Roles</a>

                <h1 class = "m-3"> Update User Roles :-</h1>
                <div>
                    <form action="{{route('update-users',$user->id)}}" method="post">
                        @csrf
                      <p>User Name :- <span class = "text-primary">{{$user->name}}</span></p>
                        <div class = "mt-3 mb-3">
                            @foreach ($getRoles as $value)
                            @if(in_array($value->id, $checkedRoles))
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="role_id[]" value="{{$value->id}}" checked id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$value->name}}</label>
                            </div>
                            @else
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="role_id[]" value="{{$value->id}}"  id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$value->name}}</label>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <button class = "btn btn-primary mt-3 mb-4" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection