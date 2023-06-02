<?php

use App\Http\Controllers\CardapioController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LeituraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/store', function () {
    return view('store');
});
Route::get('/products', function () {
    return view('products');
});
Route::get('generateCardapioPDF', [PDFController::class, 'generateCardapioPDF']);
Route::get('generateFuncionarioPDF', [PDFController::class, 'generateFuncionarioPDF']);

Route::resource('cardapio', CardapioController::class);
Route::post('cardapio/search', [CardapioController::class, 'search'])->name(
    'cardapio.search'
);

Route::get('/dashboard', function () {
    return view('base.dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('usuario', UsuarioController::class);
    Route::post('usuario/search', [UsuarioController::class, 'search'])->name(
        'usuario.search'
    );
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
    Route::resource('estoque', EstoqueController::class);
    Route::post('estoque/search', [EstoqueController::class, 'search'])->name(
        'estoque.search'
    );
    Route::resource('funcionario', FuncionarioController::class);
    Route::post('funcionario/search', [FuncionarioController::class, 'search'])->name(
        'funcionario.search'
    );
    Route::resource('leitura', LeituraController::class);
    Route::post('leitura/search', [LeituraController::class, 'search'])->name(
        'leitura.search'
    );
});

require __DIR__ . '/auth.php';
