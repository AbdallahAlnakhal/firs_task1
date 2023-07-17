<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show_data1(Request $request){
        $users = User::all();
       // dd($user);
        return view('show', ['users' => $users]);

    }
    public function showp(Request $request){
        $userId = 1; // Replace with the actual user ID
        $posts = Post::all();
        return view('postope.showpost', ['posts' => $posts, 'userId' => $userId]);
    }
    public function create()
    {
        // Retrieve all users to populate the user select dropdown
        $users = User::all();
        return view('postope.createpost', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
        $user = User::find($validatedData['user_id']);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = $validatedData['user_id'];
        $post->save();

        return redirect()->route('showpo', $post->id)->with('success', 'Post created successfully.');
    }
    public function edit($id)
    {
        $users = User::all();
        $post = Post::findOrFail($id);

        return view('postope.updatepost',  compact('post', 'users'));
    }

    public function update(Request $request, $userId, $postId)    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
        ]);

        $user = User::findOrFail($userId);
        $post = $user->posts()->findOrFail($postId);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = $validatedData['user_id'];
        $post->save();

        return redirect()->route('showpo')->with([
            'success' => 'Form updated successfully.',
        ]);    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('showpo')->with([
            'success' => 'Form deleted successfully.',
        ]);
    }

}
