<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutosController;

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

Route::middleware(['auth', 'verified'])->group(function () {

    // >>> insira suas rotas aqui !!!!! <<<
    
    Route::get('/', function () {
        return view('dashboard');
    })/*->middleware('auth')*/;
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })/*->middleware(['auth'])*/->name('dashboard');


    
});

Route::resource('/users', UserController::class);
Route::resource('/estoque', EstoqueController::class);
Route::resource('/produtos', ProdutosController::class);


Route::get('/dale', function() {
    return view('dale');
});



require __DIR__.'/auth.php';