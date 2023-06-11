<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Page, User};
use Laravel\Sanctum\Sanctum;

class PageApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Fetch a page index data with pagination
     *
     * @test
     * @return void
     */
    public function user_can_fetch_page_data()
    {
        Page::factory()->count(20)->create();
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->getJson('api/pages');

        $response->assertStatus(200)
                ->assertJsonCount(10, 'data')
                ->assertJsonStructure([
                    'data' => [
                        '*' => [
                            'id',
                            'title',
                            'slug',
                            'is_published',
                            'meta_title',
                            'meta_description'
                        ]

                    ]
                ])
                ->assertJsonPath('meta.per_page', 10)
                ->assertJsonPath('meta.total', 20);
    }

    /**
     * Insert page data
     *
     * @test
     * @return void
     */
    public function user_can_insert_page_data()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        $response = $this->postJson('api/pages', [
            'title' => 'The title',
            'slug' => 'the-slug',
            'content' => '<h1>Example Content</h1> <p>This is the title</p>',
            'is_published' => false,
            'meta_title' => 'the meta title',
            'meta_description' => 'the meta description'
        ]);

        $response->assertStatus(201)
                ->assertJson([ 'message' => 'Page successfully created!' ]);

        $this->assertDatabaseHas('pages', [
            'title' => 'The title',
            'slug' => 'the-slug',
            'is_published' => false,
            'meta_title' => 'the meta title',
            'meta_description' => 'the meta description'
        ]);
    }

    /**
     * Update page data
     *
     * @test
     * @return void
     */
    public function user_can_update_page_data()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        $page = Page::factory()->create();

        $response = $this->putJson('api/pages/'.$page->id, [
            'title' => 'Another title',
            'is_published' => true,
            'meta_title' => 'the meta title',
            'meta_description' => 'the meta description'
        ]);

        $response->assertStatus(200)
                ->assertJson([ 'message' => 'Page successfully updated!' ]);

        $this->assertDatabaseHas('pages', [
            'title' => 'Another title',
            'is_published' => true,
            'meta_title' => 'the meta title',
            'meta_description' => 'the meta description'
        ]);
    }

    /**
     * Delete page data
     *
     * @test
     * @return void
     */
    public function user_can_delete_page_data()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        $page = Page::factory()->create();

        $response = $this->deleteJson('api/pages/'.$page->id);

        $response->assertStatus(200)
                ->assertJson([ 'message' => 'Page successfully deleted!' ]);

        $this->assertDatabaseMissing('pages', [
            'title' => $page->title,
            'id' => $page->id,
        ]);
    }
}
