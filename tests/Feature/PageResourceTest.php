<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

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
}
