<?php

namespace Tests\Feature\Course;

use Tests\TestCase;
use App\Models\User\User;
use Database\Factories\CourseFactory;
use Uc\Module\Language\Model\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_cannot_view_course_show_page(): void
    {
        $user = User::factory()->student()->create();
        /** @var Language */
        $course = CourseFactory::new()->create();

        $response = $this
            ->actingAs($user)
        ->get(sprintf('/courses/%d', $course->id()));

        $response->assertStatus(403);
    }

    public function test_teacher_can_view_units_index(): void
    {
        $user = User::factory()->teacher()->create();

        /** @var Language */
        $course = CourseFactory::new()->create();

        $response = $this
            ->actingAs($user)
            ->get(sprintf('/courses/%d', $course->id()));

        $response->assertStatus(200);
        $response->assertViewIs('course.show');
    }
}
