<?php

namespace Tests\Feature;

use Tests\TestCase;
Use Illuminate\Foundation\Testing\DatabaseMigrations;


class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function tests_a_user_can_browse_tests()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);




    }
}



