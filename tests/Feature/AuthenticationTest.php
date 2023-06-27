<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test user can visit admin page.
     *
     * @return void
     */
    public function test_user_can_visit_admin_login_page()
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200)
                ->assertInertia(function(Assert $page) {
                    $page->component('Login');
                });
    }

    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create();

        $response = $this->post('/admin/login', ['email' => $user->email, 'password' => 'password']);

        $response
            ->assertStatus(302)
            ->assertRedirect('/admin/dashboard');

        $this->assertAuthenticatedAs($user, 'web');
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = User::factory()->create();

        $response = $this->post('/admin/login', ['email' => $user->email, 'password' => 'abcd']);

        $response
            ->assertStatus(302)
            ->assertRedirect('/')
            ->assertInvalid(['email' => 'Email or password is invalid']);

        $this->assertGuest();

    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->post('/admin/logout');

        $response->assertRedirect('admin/login');

        $this->assertGuest();

    }
}
