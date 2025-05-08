<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_article(): void
    {
        $data = [
            'name' => 'Article Test',
            'price' => 1000,
            'description' => 'Un article avec une superbe article',
        ];

        $response = $this->post(route('articles.store'), $data);

        $response->assertRedirect(route('articles.index'));

        $this->assertDatabaseHas('articles', [
            'name' => 'Article Test',
            'price' => 1000,
            'description' => 'Un article avec une superbe article',
        ]);
    }


    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
