<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'title' => fake()->name(),
            'description' => fake()->text(),
            'status' => 'active',
            'start_date' => fake()->date(),
            'due_date' => fake()->date(),
            'project_manager_name' => fake()->name(),
            'developer_name' => User::inRandomOrder()->first()->name,
            'user_id' => User::inRandomOrder()->first()->id,
            'budget' => fake()->numberBetween(1000, 10000),
            'priority' => 'medium',
            'project_category' => fake()->name(),
            'progress' => fake()->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
