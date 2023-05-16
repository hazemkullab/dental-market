<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> json_encode(['en'=> $this->faker->words(2,true) ,'ar'=>$this->faker->words(2,true)],JSON_UNESCAPED_UNICODE),
            'slug'=> Str::slug($this->faker->words(2,true))
        ];
    }
}
