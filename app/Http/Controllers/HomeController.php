<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        return view('home')
        ->with('projects', Project::all());
    }

    public function about()
    {
        return view('about');
    }
}
