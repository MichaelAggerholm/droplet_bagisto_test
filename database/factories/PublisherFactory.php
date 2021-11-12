<?php

namespace Database\Factories;

use App\Models\Publisher;
use Faker\Provider\Internet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublisherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publisher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'address' => $this->faker->unique()->address(),
            'phone' => $this->faker->unique()->numerify('########'),
        ];
    }
}
