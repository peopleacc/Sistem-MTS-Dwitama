<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->company(),
            'alamat' => fake()->address(),
            'lokasi' => fake()->randomElement(['Jakarta', 'Surabaya', 'Bandung', 'Semarang', 'Medan', 'Makassar']),
            'user_id' => null,
            'npwp' => fake()->numerify('##.###.###.#-###.###'),
            'notelp' => fake()->numerify('08##########'),
            'emailid' => fake()->companyEmail(),
            'bidang' => fake()->randomElement(['Konstruksi', 'Teknologi', 'Manufaktur', 'Retail', 'Jasa', 'Properti']),
            'create_by' => now(),
        ];
    }
}
