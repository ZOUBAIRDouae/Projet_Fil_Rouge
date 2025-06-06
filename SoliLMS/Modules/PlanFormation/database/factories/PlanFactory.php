<?php

namespace Modules\PlanFormation\Database\Factories;


use Modules\PlanFormation\Models\PlanAnnuel;
use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\PlanFormation\Models\User;
use Modules\PlanFormation\Models\Formateur;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanAnnuel>
 */
class PlanFactory extends Factory
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
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraph(5),
            'category_id' => $this->faker->numberBetween(1, 10),
            'user_id' => User::inRandomOrder()->first()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
