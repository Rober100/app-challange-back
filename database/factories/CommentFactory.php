<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_id' => Task::factory(), // Asigna una tarea aleatoria existente
            'user_id' => User::factory(), // Asigna un usuario aleatorio existente
            'comment' => $this->faker->sentence(2),
        ];
    }
}
