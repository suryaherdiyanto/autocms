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
        $response = $this->get('/auth/login');

        $response->assertStatus(200)
                ->assertInertia(function(Assert $page) {
                    $page->component('Login');
                });
    }

    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create();

        $response = $this->post('/auth/login', ['email' => $user->email, 'password' => 'password']);

        $response
            ->assertStatus(302)
            ->assertRedirect('/admin/dashboard');

        $this->assertAuthenticatedAs($user, 'web');
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = User::factory()->create();

        $response = $this->post('/auth/login', ['email' => $user->email, 'password' => 'abcd']);

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
                        ->post('/auth/logout');

        $response->assertRedirect('auth/login');

        $this->assertGuest();

    }

    public function test_user_cannot_access_the_login_page_if_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->get('auth/login');

        $response->assertRedirect('admin/dashboard');
    }
}
