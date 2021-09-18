<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name(rand(5,10));
        $preview_text = $this->faker->realText(rand(200, 500));
        $description = $this->faker->realText(rand(1000, 2000));

        $createdAt = $this->faker->dateTimeBetween('-3 months', '-2 months');

        return [
            'category_id'   => rand(1,11),
            'active'        => 1,
            'name'          => $name,
            'slug'          => Str::slug($name),
            'preview_text' => $preview_text,
            'description'   => $description,
            'created_at'    => $createdAt,
            'updated_at'    => $createdAt
        ];
    }
}
