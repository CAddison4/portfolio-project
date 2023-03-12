<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create() {
        return view('admin.users.create')
        ->with('user', null);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8','confirmed'],
        ]);

        $user = User::create($attributes);
        // auth()->login($user);

        // Set a flash message
        session()->flash('success','User Created Successfully');
        
        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function edit(User $user) {
        return view('admin.users.create')
        ->with('user', $user);
    }

    public function update(User $user, Request $request) {

        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email,'.$user->id],
            // 'password' => ['required','min:8','confirmed'],
        ]);

        // Generate the slug from the email
        $attributes['slug'] = Str::slug($attributes['email']);

        //Save it to the DB
        $user->update($attributes);

        // Set a flash message
        session()->flash('success','User Updated Successfully');
        
        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function destroy(User $user) {
        $user->delete();

        // Set a flash message
        session()->flash('success','User Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
