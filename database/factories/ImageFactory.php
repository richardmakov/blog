<?php

namespace Database\Factories;


use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Image::class;

    public function definition(): array
    {

        return [
            'url' => 'posts/'. $this->faker->image('public/storage/posts', 640, 480, null, false),
        ];
    }
}
