<?php

namespace Database\Factories;

use App\Models\ProjectPic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectPicFactory extends Factory
{
    protected $model = ProjectPic::class;

    public function definition(): array
    {
        return [
            'project_id' => null, // will be set in seeder
            'name' => fake()->name(),
            'phone' => fake()->numerify('08##########'),
            'phone2' => fake()->optional(0.5)->numerify('08##########'),
            'email' => fake()->safeEmail(),
            'ket' => fake()->optional(0.7)->sentence(6),
        ];
    }
}
