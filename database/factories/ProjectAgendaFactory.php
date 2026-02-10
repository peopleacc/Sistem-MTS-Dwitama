<?php

namespace Database\Factories;

use App\Models\ProjectAgenda;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectAgendaFactory extends Factory
{
    protected $model = ProjectAgenda::class;

    public function definition(): array
    {
        return [
            'project_id' => null, // will be set in seeder
            'tgl' => fake()->dateTimeBetween('-1 month', '+2 months'),
            'jam' => fake()->time('H:i:s'),
            'lokasi' => fake()->randomElement(['Jakarta', 'Surabaya', 'Bandung', 'Semarang', 'Medan', 'Makassar']),
            'ket' => fake()->randomElement([
                'Meeting dengan klien',
                'Survey lokasi',
                'Presentasi proposal',
                'Review progress',
                'Negosiasi kontrak',
                'Kick-off meeting',
                'Site visit',
                'Rapat internal',
                'Demo produk',
                'Follow up pembayaran',
            ]),
            'respon' => fake()->optional(0.5)->sentence(6),
            'tgl_respond' => fake()->optional(0.5)->dateTimeBetween('-1 month', 'now'),
            'status' => fake()->randomElement([0, 1, 2]),
        ];
    }
}
