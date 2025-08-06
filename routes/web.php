<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    //$posts = Post::all();
    if(auth()->check()) {
        $posts = Auth::user()->user_posts()->latest()->get();
    }
    return view('index', ['posts' => $posts]);
});


//Post Routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}' , [PostController::class, 'editScreen']);
Route::put('/edit-post/{post}' , [PostController::class, 'putData']);
Route::delete('/delete-post/{post}' , [PostController::class, 'deletePost']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
