<?php

namespace Tests\Feature\Access;

use Tests\TestCase;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RedirectIfAuthenticatedTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_gets_redirected_to_welcome_page(): void
    {
        $user = User::factory()->student()->create();
        $response = $this->actingAs($user)->get('/login');

        $this->assertAuthenticated();
        $response->assertRedirect('start');
    }

    public function test_teacher_gets_redirected_to_dashboard_page(): void
    {
        $user = User::factory()->teacher()->create();
        $response = $this->actingAs($user)->get('/login');

        $this->assertAuthenticated();
        $response->assertRedirect('dashboard');
    }
}
