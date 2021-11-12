<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(10),
            'mail' => $this->faker->unique()->word(15),
            'address' => $this->faker->unique()->word(15),
            'phone' => $this->faker->unique()->numerify('########'),
        ];
    }
}
