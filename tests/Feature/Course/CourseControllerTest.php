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

    public function test_student_cannot_view_portal_course_edit_page(): void
    {
        $user = User::factory()->student()->create();
        /** @var Language */
        $course = CourseFactory::new()->create();

        $response = $this
            ->actingAs($user)
            ->get(sprintf('/p/courses/%d/chapters', $course->id()));

        $response->assertStatus(403);
    }

    public function test_teacher_can_view_portal_course_edit_page(): void
    {
        $user = User::factory()->teacher()->create();

        /** @var Language */
        $course = CourseFactory::new()->create();

        $response = $this
            ->actingAs($user)
            ->get(sprintf('/p/courses/%d/chapters', $course->id()));

        $response->assertStatus(200);
        $response->assertViewIs('portal.course.show');
    }
}
