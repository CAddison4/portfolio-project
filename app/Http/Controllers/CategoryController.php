<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function getCategoriesJSON()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    
    public function create() {
        return view('admin.categories.create')
        ->with('category', null);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required', 'unique:categories,name,'],
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $category = Category::create($attributes);

        // Set a flash message
        session()->flash('success','Category Created Successfully');
        
        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function edit(Category $category) {
        return view('admin.categories.create')
        ->with('category', $category);
    }

    public function update(Category $category, Request $request) {
        $attributes = request()->validate([
            'name' => ['required', 'unique:categories,name,'.$category->id],
        ]);

        // Generate the slug from the email
        $attributes['slug'] = Str::slug($attributes['name']);

        //Save it to the DB
        $category->update($attributes);

        // Set a flash message
        session()->flash('success','Category Updated Successfully');
        
        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function destroy(Category $category) {
        $category->delete();

        // Set a flash message
        session()->flash('success','Category Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
