<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    
    public function createNews(Request $request){
        $errors = [
            'title.required' => 'The title field is required..',
            'image.required' => 'The image field is required..',
            'description.required' => 'The description field is required.....',
        ];

        $request->validate([
            'title' => 'required',
            'image' => 'required|max:2048',
            'description' => 'required' 
        ],$errors);

        $post = new Post;
        $image = $request->file('image')->getClientOriginalName();
        //image stored in public path
        $request->file('image')->storeAs('public/assets/images/',$image);
        $post->image = $image;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        
        return redirect()->back()->with('success', 'post saved successfully');
    }

    public function Home(){

        $getNews = Post::all();

        return view('welcome',compact('getNews'));

    }

    public function viewNews($id){

        $getPost = Post::find($id);

        return view('view_news',['news' => $getPost]);

    }
}
