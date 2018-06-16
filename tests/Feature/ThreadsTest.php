<?php

namespace Tests\Feature;

use Tests\TestCase;
Use Illuminate\Foundation\Testing\DatabaseMigrations;


class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();
        $response = $this->get('/threads');

        $response->assertSee($thread->body);


    }
    /** @test */
    public function a_user_can_view_specific_threads()
    {
        $thread = factory('App\Thread')->create();
        $response= $this->get('/threads/'. $thread->id);
        $response->assertSee($thread->title);
    }
}



