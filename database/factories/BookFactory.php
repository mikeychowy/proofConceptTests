<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genres = ['Fantasy', 'Action', 'Historical', 'Misc'];
        return [
            'name' => $this->faker->sentence(3),
            'genre' => $genres[array_rand($genres, 1)],
            'price' => $this->faker->randomFloat(2, 10, 7000)
        ];
    }
}
