<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $comment = [
            'content' => fake()->text(2000),
            'created_at' => fake()->dateTimeBetween(),
            'article_id' => Article::inRandomOrder()->first(),
        ];
        if (rand(0, 1) < 0.5) {
            $comment['pseudo'] = fake()->name;
            $comment['email'] = fake()->email;
        } else {
            $comment['user_id'] = User::inRandomOrder()->first();

        }
        return $comment;
    }
}
