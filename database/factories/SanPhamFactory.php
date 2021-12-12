<?php

namespace Database\Factories;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Factories\Factory;

class SanPhamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SanPham::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content ='';
        for($i=0;$i<5;$i++){
            $content .= '<p>' . $this->faker->sentences(rand(5,10),true).'</p>';
        }
        return [
            'name' => $this->faker->unique()->name(),
            'amount' => (rand(10,1000)),
            'Price' => (rand(10000,100000)),
            'description' => $content,
            'img_link' => basename($this->faker->image(storage_path('app/products'))),
        ];
    }
}
