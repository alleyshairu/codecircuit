<?php

namespace Tests\Feature\Unit;

use Tests\TestCase;
use App\Models\User\User;
use Database\Factories\UnitFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_cannot_view_units_index(): void
    {
        $user = User::factory()->student()->create();
        UnitFactory::new()->create();

        $response = $this
            ->actingAs($user)
        ->get('/units');

        $response->assertStatus(403);
    }

    public function test_teacher_can_view_units_index(): void
    {
        $user = User::factory()->teacher()->create();

        $response = $this
            ->actingAs($user)
        ->get('/units');

        $response = $this->get('/units');
        $response->assertStatus(200);
        $response->assertViewIs('unit.index');
    }
}
