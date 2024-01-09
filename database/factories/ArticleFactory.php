<?php

namespace Database\Factories;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = UploadedFile::fake()->image('test.png');
        // $photoChambre = UploadedFile::fake()->image('teste.png');
        return [
            'nom' => $this->faker->name,
            'categorie' => $this->faker->word,
            'photo' => $image,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['Disponible', 'Non disponible']),
            'date' => $this->faker->date,
            'nombreChambre' => 1, // Assurez-vous que c'est un nombre
            'nombreBalcon' => 5,
            'nombreEspaceVert' => 2,
            'dimension' => '30m',
        ];

    }
}
