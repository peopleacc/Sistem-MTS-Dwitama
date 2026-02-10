<?php

namespace Database\Factories;

use App\Models\ProjectFoto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFotoFactory extends Factory
{
    protected $model = ProjectFoto::class;

    public function definition(): array
    {
        return [
            'project_id' => null, // will be set in seeder
            'folder' => 'uploads/projects/' . fake()->word(),
            'keterangan' => fake()->optional(0.8)->sentence(4),
        ];
    }
}
