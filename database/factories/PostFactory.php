<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $booleans = array(true, false);
        $mesta = [
            'Beograd' => 101801,
            'Jagodina' => 35000,
            'Cacak' => 32000,
            'Kragujevac' => 55061,
            'Nis' => 700132
        ];

        $mesto = array_rand($mesta);
        $postanski_broj = $mesta[$mesto];

        return [
            'korisnik_id' => 1,
            'kategorija_id' => rand(1,2),
            'naziv' => $this->faker->sentence,
            'slug' => $this->faker->sentence,
            'cena' => rand(1,1000),
            'godina' => rand(1900,2022),
            'koriscenost' => array_rand($booleans),
            'ispravnost' => array_rand($booleans),
            'zamena' => array_rand($booleans),
            'proizvodjac' => $this->faker->word,
            'opis' => $this->faker->text(400),
            'mesto' => $mesto,
            'postanski_broj' => $postanski_broj,
            'kontakt' => '06'.strval(rand(0,9)).strval(rand(0000001, 9999999)),
            'garantovanje_tacnosti' => true,
            'saglasnost' => true,
            'odobren' => array_rand($booleans),
        ];

    }
}
