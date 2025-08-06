<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

//Post Routes
Route::get('/index', function () {
    
    // if(auth()->check()) {
    //     $posts = Auth::user()->user_posts()->latest()->get();
    // }
    $posts = Post::all();
    return view('index', ['posts' => $posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/displayForm', [PostController::class, 'displayForm']);
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}' , [PostController::class, 'editScreen']);
Route::put('/edit-post/{post}' , [PostController::class, 'putData']);
Route::delete('/delete-post/{post}' , [PostController::class, 'deletePost']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
