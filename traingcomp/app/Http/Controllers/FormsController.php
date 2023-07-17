<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FormData;

class FormsController extends Controller
{
    public function hellow()
    {
        return view('hello');
    }

    public function form1()
    {
        return view('form');
    }

    public function form1_data(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email', // Add the unique rule with table and column
        ]);
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->route('show')->with([
            'success' => 'Form submitted successfully.',
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return redirect()->route('show')->with([
            'success' => 'Form Edited successfully.',
        ]);
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('show')->with([
            'success' => 'Form deleted successfully.',
        ]);
    }
}
