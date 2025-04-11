<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/90', [PostController::class, 'index_90'])->name('posts.index_90');

Route::get('/2000', [PostController::class, 'index_2000'])->name('posts.index_2000');

Route::get('/2010', [PostController::class, 'index_2010'])->name('posts.index_2010');


Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/posts', action: [PostController::class, 'index'])->name('posts.index');
// Ruta para mostrar un formulario para crear un nuevo post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Ruta para almacenar un nuevo post en la base de datos
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Ruta para mostrar un post específico por su ID
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Ruta para mostrar un formulario para editar un post existente
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Ruta para actualizar un post existente en la base de datos
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

// Ruta para eliminar un post específico por su ID
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Ruta para agregar un comentario a un post específico
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');


Route::middleware(['auth'])->group(function () {
    // Rutas protegidas que requieren autenticación
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Otras rutas protegidas...
});
Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');

require __DIR__.'/auth.php';