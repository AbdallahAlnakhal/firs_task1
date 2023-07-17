<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sPostController extends Controller
{
    public function showp(){
        $post = Post::all();
        // dd($user);
        return view('showpost', ['post' => $post]);

    }
//    public function showp_data(Request $request){
//
//
//
//    }
    public function store(Request $request, User $user)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $user->post()->save($post);

        return redirect()->route('users.post', $user);
    }
}
