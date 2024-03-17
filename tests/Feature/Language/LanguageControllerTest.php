<?php

namespace Tests\Feature\Unit;

use Tests\TestCase;
use App\Models\User\User;
use Database\Factories\UnitFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_cannot_view_language_index(): void
    {
        $user = User::factory()->student()->create();
        UnitFactory::new()->create();

        $response = $this
            ->actingAs($user)
        ->get('/languages');

        $response->assertStatus(403);
    }

    public function test_teacher_can_view_language_index(): void
    {
        $user = User::factory()->teacher()->create();

        $response = $this
            ->actingAs($user)
        ->get('/languages');

        $response = $this->get('/languages');
        $response->assertStatus(200);
        $response->assertViewIs('language.index');
    }
}
