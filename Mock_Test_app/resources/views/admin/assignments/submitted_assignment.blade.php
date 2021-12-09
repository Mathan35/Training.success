
@extends('layouts.header')
@section('content')

            <div class = "mt-4 mx-5 assignment-content">
                <h1>Submitted Assignments</h1>
                
                <div class = "submitted-content">
                    @foreach($submitted_data as $data)
                    <div class = "card mt-3">
                        <div class = "card-body m-3">
                            <p ck>Submitted date and Time : {{ $data->created_at->format('d,'.' F'.' y'.', H:i') }}</p>
                            <p>User Name : {{$data->getUser->name}}</p>
                            <p>Assignment Title : {{$data->getAssignment->title}}</p>
                            <p>View Assignments</p>
                            <li><a class = "text-decoration-none" href="{{$data->github_url}}">Github link</a></li>
                            @isset($data->output_url)
                            <li><a class = "text-decoration-none"  href="{{$data->output_url}}">Output link</a></li>
                            @endisset
                        </div>
                        <div class = "status m-3">
                            <form action="{{route('update_status',$data->id)}}" method="post">
                            @csrf
                            <select  name = "status" class="form-select" aria-label="Default select example">
                                <option value = "0" selected><?php echo $data->status=="0"? "Not Selected":$data->status ?></option>
                                <?php echo $data->status=="pending"?  " ":'<option value="pending">Pending</option>' ?>
                                <?php echo $data->status=="reviewed"?  " ":'<option value="reviewed">Reviewed</option>' ?>
                            </select>
                            <button class = "mt-3 btn btn-primary" type="submit">Update Status</button>
                            </form>
                        </div>
                    </div><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
   
@endsection