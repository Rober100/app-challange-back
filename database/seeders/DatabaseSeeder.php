<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea 10 usuarios de prueba
        User::factory(10)->create();

        // Crea 10 tareas de prueba
        Task::factory(10)->create();

        // Crea 10 comentarios de prueba
        Comment::factory(10)->create();

        // También puedes crear relaciones entre los modelos si es necesario.
        // Por ejemplo, para asignar un usuario aleatorio a cada tarea creada:
        Task::all()->each(function ($task) {
            $task->update(['employee_id' => User::inRandomOrder()->first()->id]);
        });
    }
}

