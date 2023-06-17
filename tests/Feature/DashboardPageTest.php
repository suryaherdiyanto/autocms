<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

class DashboardPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test if authenticated user can see the dashboard page
     *
     * @return void
     */
    public function test_if_authenticated_user_can_see_dashboard_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(200)
                ->assertInertia(function(Assert $page) {
                    $page->component('Dashboard');
                });
    }

    /**
     * Test user cannot access dashboard page if not authenticated
     *
     * @return void
     */
    public function test_user_cannot_access_dashboard_if_not_authenticated()
    {
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(302)
                ->assertRedirect('/admin/login');

    }
}
