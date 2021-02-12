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
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'image' => 'https://dummyimage.com/600x400/000/fff&text='.$this->faker->word,
        ];
    }
}
