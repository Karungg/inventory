<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motivation>
 */
class MotivationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => 1,
            'id_kategori' => 1,
            'isi_motivasi' => 'Semagat belajar',
            'tanggal_input' => now()->toString(),
            'tanggal_update' => now()->toString()
        ];
    }
}
