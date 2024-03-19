<?php

namespace Tests\Feature\Language;

use Tests\TestCase;
use App\Models\User\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_cannot_view_student_index(): void
    {
        /** @var User */
        $user = UserFactory::new()->student()->create();

        $response = $this
            ->actingAs($user)
        ->get('/students');

        $response->assertStatus(403);
    }

    public function test_teacher_can_view_student_index(): void
    {
        /** @var User */
        $user = UserFactory::new()->teacher()->create();

        // crate student user
        UserFactory::new()->student()->create();

        $response = $this
            ->actingAs($user)
        ->get('/students');

        $response = $this->get('/students');
        $response->assertStatus(200);
        $response->assertViewIs('student.index');
    }
}
