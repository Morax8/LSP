<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pengaduan>
 */
class PengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'tujuan_id' => mt_rand(1, 4),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'telpon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->sentence(mt_rand(2, 8)),
            'tanggal' => $this->faker->date(),
            'isi' => $this->faker->sentence(mt_rand(2, 8)),
            'active' => 0,
        ];
    }
}
