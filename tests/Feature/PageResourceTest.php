<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;
use Illuminate\Support\Str;

class PageResourceTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_page_index_is_accessible()
    {
        $response = $this->actingAs($this->user)->get('/admin/pages');

        $response->assertStatus(200)->assertInertia(function(AssertableInertia $assert) {
            $assert->component('modules/page/Index');
        });
    }

    public function test_it_has_correct_paginator_property()
    {
        Page::factory()->count(10)->create();
        $response = $this->actingAs($this->user)->get('/admin/pages?perpage=5');

        $response->assertStatus(200)->assertInertia(function(AssertableInertia $assert) {
            $assert->has('pages.data', 5);
            $assert->where('pages.last_page', 2);
        });
    }

    public function test_user_can_visit_create_page_and_return_the_correct_component()
    {
        $response = $this->actingAs($this->user)->get('/admin/pages/create');

        $response->assertStatus(200)->assertInertia(function(AssertableInertia $assert) {
            $assert->component('modules/page/Create');
        });
    }

    public function test_user_can_save_page_and_data_is_saved_to_the_database()
    {
        $page = Page::factory()->make(['status' => 'draft']);
        $response = $this->actingAs($this->user)->post('/admin/pages', $page->toArray());

        $response->assertStatus(302);
        $this->assertDatabaseHas('pages', $page->toArray());
    }


    public function test_save_page_validation_failed()
    {
        $page = Page::factory()->state([
            'title' => null,
            'status' => 'invalid'
        ])->make();
        $response = $this->actingAs($this->user)->post('/admin/pages', $page->toArray());

        $response->assertInvalid(['status', 'title']);
    }

    public function test_validation_page_the_title_and_slug_should_not_grater_than_100_chars()
    {
        $title = implode(' ', fake()->sentences(10));
        $page = Page::factory()->state([
            'title' => $title,
            'slug' => Str::slug('-', $title)
        ])->make();
        $response = $this->actingAs($this->user)->post('/admin/pages', $page->toArray());

        $response->assertInvalid(['title', 'slug']);
    }
}
