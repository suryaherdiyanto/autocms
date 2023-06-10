<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Page;

class PageApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function fetch_page_data()
    {
        Page::factory()->count(20)->create();

        $response = $this->getJson('api/pages');

        $response->assertStatus(200)
                ->assertJsonCount(10, 'data')
                ->assertJsonStructure([
                    'data' => [
                        '*' => [
                            'id',
                            'title',
                            'slug',
                            'content',
                            'is_published',
                            'meta_title',
                            'meta_description'
                        ]

                    ]
                ]);
    }
}
