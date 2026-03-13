<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###########'),
            'email' => $this->faker->email(),
            'telefone' => $this->faker->phoneNumber()
        ];
    }
}
