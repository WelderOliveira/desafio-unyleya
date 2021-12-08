<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\LivrosController::class, 'index'])
        ->name('indexLivro');

    Route::get('/livro/create', [\App\Http\Controllers\LivrosController::class, 'create'])
        ->name('createLivro');

    Route::post('/livro', [\App\Http\Controllers\LivrosController::class, 'store'])
        ->name('storeLivro');

    Route::get('/livro/edit/{id}', [\App\Http\Controllers\LivrosController::class, 'edit'])
        ->name('editLivro');

    Route::get('/livro/{id}', [\App\Http\Controllers\LivrosController::class, 'show'])
        ->name('showLivro');

    Route::put('/livro/edit/{id}', [\App\Http\Controllers\LivrosController::class, 'update'])
        ->name('updateLivro');

    Route::delete('/livro/{id}', [\App\Http\Controllers\LivrosController::class, 'destroy'])
        ->name('destroyLivro');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/autor', [\App\Http\Controllers\AutorController::class, 'index'])
        ->name('indexAutor');

    Route::get('/autor/create', [\App\Http\Controllers\AutorController::class, 'create'])
        ->name('createAutor');

    Route::post('/autor', [\App\Http\Controllers\AutorController::class, 'store'])
        ->name('storeAutor');

    Route::get('/autor/edit/{id}', [\App\Http\Controllers\AutorController::class, 'edit'])
        ->name('editAutor');

    Route::get('/autor/{id}', [\App\Http\Controllers\AutorController::class, 'show'])
        ->name('showAutor');

    Route::put('/autor/edit/{id}', [\App\Http\Controllers\AutorController::class, 'update'])
        ->name('updateAutor');

    Route::delete('/autor/{id}', [\App\Http\Controllers\AutorController::class, 'destroy'])
        ->name('destroyAutor');
});

require __DIR__ . '/auth.php';
