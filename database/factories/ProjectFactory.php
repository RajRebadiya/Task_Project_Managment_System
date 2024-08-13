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
        $user = User::inRandomOrder()->first();
        return [
            //
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'start_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'project_manager' => $user->name,
            'priority' => $this->faker->numberBetween(1, 5),
            'project_category' => $this->faker->randomElement(['Laravel', 'Flutter', 'React', 'NodeJS', 'UI/UX']),
            'budget' => $this->faker->numberBetween(1000, 10000),
            'status' => $this->faker->randomElement(['In Progress', 'Active', 'Completed',]),

        ];
    }
}
