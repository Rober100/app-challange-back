<?php

// TaskFactory.php
namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'completed']),
            // Cambiamos 'user_id' a 'employee_id' para reflejar el cambio en la migración
            'employee_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
