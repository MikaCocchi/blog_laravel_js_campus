<?php

namespace Tests;




use Database\Seeders\DatabaseSeeder;

class Test extends TestCase
{

    public function test_articles_api()
    {
        $response = $this->get('/api/articles');

        $response->assertStatus(200);
    }
    public function test_comment_store()
    {
        $this->seed(DatabaseSeeder::class);
        $response = $this->postJson('/api/comments', [
            'content' => 'this is my test content',
            'article_id' => '5',
            'pseudo' => 'testPseudo',
            'email' => 'testemail@gmail.com',
        ]);

        $response->assertOk()->assertJson([
            'content' => true,
            'article_id' => true,
            'pseudo' => true,
            'email' => true,
        ]);
    }
}
