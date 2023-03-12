<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function create() {
        return view('admin.tags.create')
        ->with('tag', null);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required', 'unique:tags,name,'],
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $tag = Tag::create($attributes);

        // Set a flash message
        session()->flash('success','Tag Created Successfully');
        
        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function edit(Tag $tag) {
        return view('admin.tags.create')
        ->with('tag', $tag);
    }

    public function update(Tag $tag, Request $request) {
        $attributes = request()->validate([
            'name' => ['required', 'unique:tags,name,'.$tag->id],
        ]);

        // Generate the slug from the email
        $attributes['slug'] = Str::slug($attributes['name']);

        //Save it to the DB
        $tag->update($attributes);

        // Set a flash message
        session()->flash('success','Tag Updated Successfully');
        
        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function destroy(Tag $tag) {
        $tag->delete();

        // Set a flash message
        session()->flash('success','Tag Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

}
