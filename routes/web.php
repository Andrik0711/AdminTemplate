<?php

use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RegistrarFacturaController;
use App\Http\Controllers\RegistrarEmpresaEmisoraController;
use App\Http\Controllers\RegistrarEmpresaReceptoraController;

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

// Ruta que redirecciona a la vista dashboard
Route::get('/', [HomeController::class, 'home'])->name('home');

// Ruta que redirecciona al login   
Route::get('/login', [RegisterUserController::class, 'login_index'])->name('login');

// Ruta para loguear un usuario
Route::post('/login', [RegisterUserController::class, 'login_store'])->name('login.store');

// Ruta que redirecciona al registro
Route::get('/register', [RegisterUserController::class, 'register_index'])->name('register');

// Ruta para registrar un usuario
Route::post('/register', [RegisterUserController::class, 'register_store'])->name('register.store');

// Ruta para cerrar sesión
Route::get('/logout', [RegisterUserController::class, 'logout'])->name('logout');

// Ruta para direccionar al formulario de Empresa Emisora
Route::get('/emisora', [RegistrarEmpresaEmisoraController::class, 'index'])->name('emisora');

//Ruta para registrar una empresa emisora
Route::post('/emisora', [RegistrarEmpresaEmisoraController::class, 'store'])->name('emisora.store');

// Ruta para direccionar al formulario de Empresa Receptora
Route::get('/receptora', [RegistrarEmpresaReceptoraController::class, 'index'])->name('receptora');

// Ruta para registrar una empresa receptora
Route::post('/receptora', [RegistrarEmpresaReceptoraController::class, 'store'])->name('receptora.store');

// Ruta para direccionar al formulario de Factura
Route::get('/factura', [RegistrarFacturaController::class, 'index'])->name('factura');

// Ruta para registrar una factura
Route::post('/factura', [RegistrarFacturaController::class, 'store'])->name('factura.store');

// Ruta para guardar un archio XML o PDF en uploads
Route::post('/facturafile', [ArchivoController::class, 'store'])->name('archivos.store');
