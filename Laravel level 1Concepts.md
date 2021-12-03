# Training.success

Laravel learnings:

Composer:-
----------
its having all the dependencies and Used to managing the dependencies

Composer.json ->having all the package information
Composer.lock ->having all the package detailed information

.gitignore -> we can mention files which is not necessary to push into gitub

Namespace:-
-----------
Used define the path of the current file

CSRF:-
------
Its generate hidden token when submit the form and security is the one of the main reason for using this.
itd defined in kernel.php

Route:-
-------
Closure:- used to define view and parameters in same route file.
Route Grouping:- we can include multiple route in one route with middleware condition,auth and prefix
Callback:- callback parameters in route function and return or send to view.
creating additional routes-> defining route in route service provider and using that easily
Route methodes -> get,post,any(accepts any method request method) ,put,patch,delete,options
Match -> we can match like get and post ['get', 'post'] its get any request

Route::view('/') -> used view file only and also we can send key,values

we can define many route parameter id,name etc.   
example :- '/posts/{post}/comments/{comment}'

## send array or data from route like:
  
  $array = [
  'name' = 'mathan',
  'age' = '24'
  ]
## calling via different methodes
return view('view_file_name')->with('userName' => $array);
or    
return view('view_file_name',compact('array'));
or
return view('view_file_name',['userName' => $array]);
        
Dependency injection:-
----------------------
use Illuminate\Http\Request; //declare request
  
and using in function (Request $request) ,then we get current request data

Controller:-
------------   
public function functionName(){
$array = [
  'name' = 'mathan',
  'age' = '24'
];
   return view('view_file_name',['userName' => $array]);
   or
   return view('view_file_name',compact('array'));
}

## we can request and save the data like below
   $taskName = new Task;

   $taskName->task_name = $request->task_name;

   $taskName->save();

Blade:-
------
it is fastest and simple one located in resource/view folder.

we can define the data like 
Hello, {{ $name }} (object).
Hello, {{ $array['name'] }} (array).

## Methodes in blade:-

## put whatever when user not logged in,
@unless (Auth::check())
    You are not signed in.
@endunless

## check that record is null or empty
@isset($records)
    // $records is defined and is not null...
@endisset

@empty($records)
    // $records is "empty"...
@endempty

## put some text or data or link when user authenticated or not authenticated
@auth
    // The user is authenticated...
@endauth

@guest
    // The user is not authenticated...
@endguest

## we can put tha data via loop
@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

Validation:-
------------
## we can validate data from form

 $validated = $request->validate([
        'title' => 'required|unique',
        'body' => 'required',
        'password' =>'required|max:8'
    ]);
    
## we can set the error message when condition false
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
## send custum message from controller
$messages = [
    'email.required' => 'We need to know your email address!',
];

ENV:-
-----
we can define all the detail about db connection in env,
than we can connect multiple db.

Migration:-
-----------
we have all the migration files in migration folder
we can create migration files and add columns inside the schema
then we can migrate
if we need to add more columns after migrate we can add in another migration file and add column to the same table

Model:-
-------
the name of model and table must be same, if put different model name we can define like $protected table = "table_name";
all the elaquent orm process running via model
we need define data name in fillable[] (which data we need to insert)


