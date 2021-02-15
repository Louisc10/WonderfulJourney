<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array = [
            '1.jpg',
            '2.png',
            '3.png',
        ];

        return [
            'user_id' => $this->faker->numberBetween($min = 2, $max = 11),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'title' => $this->faker->words($nb = 3, $variableNbWords = true),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'image' => $this->faker->randomElement($array),
        ];
    }
}
