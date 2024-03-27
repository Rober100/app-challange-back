<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas de usuario
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
Route::get('/users', [UserController::class, 'getAllUsers']);

// Rutas de tareas sin autenticación temporal
Route::post('/tasks', [TaskController::class, 'store']); // Crear una nueva tarea
Route::get('/tasks', [TaskController::class, 'index']); // Obtener todas las tareas
Route::get('/tasks/{task}', [TaskController::class, 'show']); // Obtener una tarea específica
Route::put('/tasks/{task}', [TaskController::class, 'update']); // Actualizar una tarea
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']); // Eliminar una tarea

// Rutas de comentarios
Route::post('/comments', [CommentController::class, 'store']); // Crear un nuevo comentario
Route::get('/comments/{comment}', [CommentController::class, 'show']); // Obtener un comentario específico
Route::delete('/comments/{comment}', [CommentController::class, 'destroy']); // Eliminar un comentario
