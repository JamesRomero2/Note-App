<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [RouterController::class, 'goToLoginPage'])->name('login');
Route::get('/register', [RouterController::class, 'goToRegisterPage']);

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

// For User Controller
Route::post('/add-new-user', [UserController::class, 'register']);
Route::put('/update-user/{user_id}', [UserController::class, 'update'])->middleware('auth');
Route::get('/update-user/{user_id}', [UserController::class, 'updatePage'])->middleware('auth');
Route::delete('/delete-user/{user_id}', [UserController::class, 'delete'])->middleware('auth');
Route::post('/login-user', [UserController::class, 'login']);
Route::post('/logout-user', [UserController::class, 'logout']);

// For Note Controller
Route::post('/add-new-note', [NoteController::class, 'addNote']);
Route::put('/update-note/{note}', [NoteController::class, 'updateNote'])->middleware('auth');
Route::get('/update-note/{note}', [NoteController::class, 'updateNotePage'])->middleware('auth');
Route::delete('/delete-note/{note}', [NoteController::class, 'deleteNote'])->middleware('auth');
Route::get('/dashboard', [NoteController::class, 'getAllNote'])->name('dashboard'); 
