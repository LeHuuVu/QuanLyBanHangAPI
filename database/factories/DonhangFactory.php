<?php

namespace Database\Factories;

use App\Models\Donhang;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonhangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donhang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Accept' => (bool)rand(0,1),
            'Address' => $this->faker->unique()->address(),
        ];
    }
}
