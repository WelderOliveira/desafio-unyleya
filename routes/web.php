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

    Route::get('/livro/edit/{id}',[\App\Http\Controllers\LivrosController::class,'edit'])
        ->name('editLivro');

    Route::put('/livro/edit/{id}',[\App\Http\Controllers\LivrosController::class,'update'])
        ->name('updateLivro');

    Route::delete('/livro/{id}',[\App\Http\Controllers\LivrosController::class,'destroy'])
        ->name('destroyLivro');
});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
