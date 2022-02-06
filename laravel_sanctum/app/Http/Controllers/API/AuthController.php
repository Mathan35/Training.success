<?php

namespace App\Http\Controllers\api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Comment;
class AuthController extends Controller
{

    public function Onetoone(){

        $user = User::find(1);

        $post = Post::create([
            'title' => "2nt post",
        ]);

        $user->image()->create([
            'image_url' => "user_image_url",
        ]);
        $post->image()->create([
            'image_url' => "post_image_url",
        ]);

        return response("stored successfully...");

    }
    public function Getonetoone(){
        $post = Post::find(1);
        return response($post->image);
    }

    public function Onetomany(){

        $post = Post::create([
            'title' => "good post from ravi",
          
        ]);

        $video = Video::create([
            'title' => "good post from ravi",
          
        ]);

        $post->comments()->create([
            'user_id' => 1,
            'body' => "body from comments tables for post",
           
        ]);

        $video->comments()->create([
            'user_id' => 1,
            'body' => "body from comments tables for video",
        ]);
       
        return response("stored successfully...");

    }
    public function Getonetomany(){
        $post = Post::find(2);
        return response($post->comments);

        return response()->json([
            'data' => $post->comments,
        ]);
    }

    public function Getonomany(){
        $post = Post::find(2);
        return response($post->comments);

        return response()->json([
            'data' => $post->comments,
        ]);
    }

    public function Manytomany(){
      
        $post = Post::create([
            'title' => "good post from many to many",
          
        ]);

        $tag = Tag::insert([
            ['title' => "tag 1"],
            ['title' => "tag 2"],
            ['title' => "tag 3"],
        ]);
        
        $tag = [1,2,3];

        $post->tags()->attach($tag);

        

        //video
        $video = Video::create([
            'title' => "2nd video from mathan",
          
        ]);

        $tag = [1,2,3];

        $video->tags()->attach($tag);
        return response("stored successfully...");

    }

    public function GetManytomany(){
        
        // $post = Post::find(3);
        // return response($post->tags);

        $video = Video::find(2);
        return response($video->tags);

        $tag = Tag::find(1);
        return response($tag->posts);

    }
    
    
    public function Register(Request $request){

       $user = User::create([
           'name'     => $request->name,
           'email'    => $request->email,
           'password' => Hash::make($request->password),
       ]);

       $token = $user->createToken('user_token')->plainTextToken;

       $response = [
           'user'  => $user,
           'token' => $token,
       ];
       return response($response);
    }
    public function Logout(){
          auth()->user()->tokens()->delete();
          return response("Logout successfully...");
    }
   

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email',$request->email)->first();
        if (Auth::attempt($credentials)) {

            $token = $user->createToken('user_token')->plainTextToken;

            $response = [
                'user'  => $user,
                'token' => $token,
            ];
            return response($response);
        }
            return response("The provided credentials do not match our records");        
    }
}
