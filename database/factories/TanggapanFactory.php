<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tanggapan>
 */
class TanggapanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pengaduan_id' => mt_rand(1, 4),
            'tanggal' => $this->faker->date(),
            'isi' => $this->faker->sentence(mt_rand(2, 8)),
        ];
    }
}
