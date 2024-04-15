<?php

namespace Tests\Feature\Language;

use Tests\TestCase;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_cannot_view_portal_language_index(): void
    {
        $user = User::factory()->student()->create();

        $response = $this
            ->actingAs($user)
        ->get('/p/languages');

        $response->assertStatus(403);
    }

    public function test_teacher_can_view_portal_language_index(): void
    {
        $user = User::factory()->teacher()->create();

        $response = $this
            ->actingAs($user)
        ->get('/p/languages');

        $response = $this->get('/p/languages');
        $response->assertStatus(200);
        $response->assertViewIs('portal.language.index');
    }
}
