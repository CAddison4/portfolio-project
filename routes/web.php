<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home Page
Route::get('/', [HomeController::class, 'index']);

//About Page
Route::get('/about', [HomeController::class, 'about']);

//Projects List
Route::get('/projects', [ProjectController::class, 'index']);

//Individual Project Details
Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);

//Projects by Category
Route::get('/projects/categories/{category:slug}', [ProjectController::class, 'listByCategory']);

//Projects by Tag
Route::get('/projects/tags/{tag:slug}', [ProjectController::class, 'listByTag']);

//Login
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('login')->middleware('guest');

//Logout
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

//Error Handling
Route::fallback(function() {

    // Set a flash message
    session()->flash('error','Requested page not found.  Home you go.');

    // Redirect to /
    return redirect('/');
});

Route::get('/api/projects', [ProjectController::class, 'getProjectsJSON']);
Route::get('/api/categories', [CategoryController::class, 'getCategoriesJSON']);
Route::get('/api/tags', [TagController::class, 'getTagsJSON']);

//Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    //Create Project
    Route::get('/admin/projects/create', [ProjectController::class, 'create']);
    Route::post('/admin/projects/create', [ProjectController::class, 'store']);

    //Edit Project
    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit']);
    Route::patch('/admin/projects/{project}/edit', [ProjectController::class, 'update']);

    //Delete Project
    Route::delete('/admin/projects/{project}/delete', [ProjectController::class, 'destroy']);

    //View Project
    Route::get('/admin/projects/{project:slug}', [ProjectController::class, 'show']);

    //Create User
    Route::get('/admin/users/create', [UserController::class, 'create']);
    Route::post('/admin/users/create', [UserController::class, 'store']);

    //Edit User
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit']);
    Route::patch('/admin/users/{user}/edit', [UserController::class, 'update']);

    //Delete User
    Route::delete('/admin/users/{user}/delete', [UserController::class, 'destroy']);

    //Create Category
    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories/create', [CategoryController::class, 'store']);

    //Edit User
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::patch('/admin/categories/{category}/edit', [CategoryController::class, 'update']);

    //Delete User
    Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'destroy']);


    //Create Tag
    Route::get('/admin/tags/create', [TagController::class, 'create']);
    Route::post('/admin/tags/create', [TagController::class, 'store']);

    //Edit Tag
    Route::get('/admin/tags/{tag}/edit', [TagController::class, 'edit']);
    Route::patch('/admin/tags/{tag}/edit', [TagController::class, 'update']);

    //Delete Tag
    Route::delete('/admin/tags/{tag}/delete', [TagController::class, 'destroy']);

    


});

