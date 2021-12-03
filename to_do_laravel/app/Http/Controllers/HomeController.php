<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    
    public function Index()
    {
        $user = User::find(Auth::id());
        $tasks = Task::get();
        return view('dashboard',compact('tasks'),['user_name' => $user]);

    }

    public function createTask(Request $request)
    {

        $request->validate([
            'task_name' => 'required',
        ], $messages);

        $taskName = new Task;

        $taskName->task_name = $request->task_name;

        $taskName->save();

        return redirect(route('dashboard'));
    }
    public function deleteTask($id)
    {

        $findTask=Task::where('id',$id)->delete();

        return redirect()->back();

    }
}
