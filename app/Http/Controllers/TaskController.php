<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las tareas
        $tasks = Task::all();
        return response()->json($tasks, 200);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string|in:pending,in_progress,blocked,completed',
            'employee_id' => 'required|exists:users,id',
        ]);

        // Crear una nueva tarea
        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'employee_id' => $request->input('employee_id'),
        ]);

        return response()->json($task, 201);
    }

    /**
     * Display the specified task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        // Mostrar una tarea específica
        return response()->json($task, 200);
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        // Validar los datos de entrada
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string|in:pending,in_progress,blocked,completed',
            'employee_id' => 'required|exists:users,id',
        ]);

        // Actualizar la tarea
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'employee_id' => $request->input('employee_id'),
        ]);

        return response()->json($task, 200);
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        // Eliminar la tarea
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
