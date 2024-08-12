<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'project_id' => Project::inRandomOrder()->first()->id,
            'title' => fake()->name(),
            'description' => fake()->text(),
            'status' => 'pending',
            'due_date' => fake()->date(),
            'start_date' => fake()->date(),
            'user_id' => array_rand(User::pluck('id')->toArray()),
            'priority' => 'medium',
            'progress' => fake()->numberBetween(0, 100),
            'category' => fake()->name(),
            'estimated_hours' => fake()->numberBetween(0, 100),
            'logged_hours' => fake()->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
