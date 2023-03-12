<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Tag;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('categoryName', null);

    }

    public function show(Project $project, Request $request)
    {
        return view('projects.project',['project' => $project]);
    }

    public function create() {
        return view('admin.projects.create')
        ->with('project', null)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function store(Request $request) {
        //Dump out all the form data
        // ddd(request()->all());

        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
        ]);

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        // Generate the slug from the title
        $attributes['slug'] = Str::slug($attributes['title']);

    
        //Save it to the DB
        $project = Project::create($attributes);

        // Attach tags to project
        $project->tags()->attach($request['tags']);

        // Set a flash message
        session()->flash('success','Project Created Successfully');
        
        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function update(Project $project, Request $request) {

        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
        ]);

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        // Generate the slug from the title
        $attributes['slug'] = Str::slug($attributes['title']);

        //Save it to the DB
        $project->update($attributes);

        // Attach tags to project
        $project->tags()->sync($request['tags']);

        // Set a flash message
        session()->flash('success','Project Updated Successfully');
        
        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function destroy(Project $project) {
        $project->tags()->detach();
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('projects', $category->projects)
        ->with('category', $category);
    }

    public function listByTag(Tag $tag)
    {
        return view('projects.index')
        ->with('projects', $tag->projects)
        ->with('tag', $tag);
    }


    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }



}
