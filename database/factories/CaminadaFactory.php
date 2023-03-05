<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CaminadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'descripcio' => $this->faker->text,
            'data_caminada' => $this->faker->date,
            'participants' => $this->faker->randomDigit,
            'caminada_numero' => $this->faker->randomDigit,
            'poblacio' => $this->faker->city, 
            'direccio_inici' => $this->faker->address, 
            'coordenades_inici' => $this->faker->latitude, 
            'track_id' => $this->faker->randomDigit, 
            'imatges_id' => $this->faker->randomDigit,
            'mapa_id' => $this->faker->randomDigit, 
            'altimetria_id' => $this->faker->randomDigit, 
            'triptic_id' => $this->faker->randomDigit,
        ];
    }
}
