<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_team_page_is_displayed(): void
    {
        $response = $this->get('/team');
        $response->assertOk();
    }
}
