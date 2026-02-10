<?php

namespace Database\Factories;

use App\Models\ProjectDetil;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectDetilFactory extends Factory
{
    protected $model = ProjectDetil::class;

    public function definition(): array
    {
        return [
            'kode' => strtoupper(fake()->unique()->bothify('??####')),
            'jumlah' => fake()->numberBetween(1, 100),
            'project_id' => null, // will be set in seeder
            'ket' => fake()->optional(0.7)->sentence(5),
        ];
    }
}
