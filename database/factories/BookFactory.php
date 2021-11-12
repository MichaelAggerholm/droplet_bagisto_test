<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'ISBN' => $this->faker->unique()->word(15),
            'publisher_id' => Publisher::factory(),
            'author_id' => Author::factory(),
            'year' => $this->faker->unique()->numerify('####'),
            'title' => $this->faker->unique()->word(10),
            'price' => $this->faker->unique()->numerify('###'),
        ];
    }
}
