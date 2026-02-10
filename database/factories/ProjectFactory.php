<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'project_name' => fake()->randomElement([
                'Pembangunan Gedung',
                'Renovasi Kantor',
                'Instalasi Jaringan',
                'Pemasangan CCTV',
                'Pengadaan Server',
                'Maintenance AC',
                'Pembangunan Gudang',
                'Instalasi Listrik',
                'Pengecatan Gedung',
                'Pemasangan Lift'
            ]) . ' ' . fake()->company(),
            'custid' => null, // will be set in seeder
            'alamat' => fake()->address(),
            'lokasi' => fake()->randomElement(['Jakarta', 'Surabaya', 'Bandung', 'Semarang', 'Medan', 'Makassar']),
            'ket' => fake()->sentence(10),
            'status' => fake()->randomElement([0, 1, 2]),
            'level' => fake()->randomElement(['Low', 'Medium', 'High']),
            'wil' => fake()->randomElement(['JK', 'SB', 'BD', 'SM', 'MD', 'MK']),
        ];
    }
}
