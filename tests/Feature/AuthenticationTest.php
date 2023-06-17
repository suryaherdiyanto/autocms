<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class AuthenticationTest extends TestCase
{
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
}
