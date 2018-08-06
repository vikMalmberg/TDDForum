<?php

namespace Tests\Feature;

use Tests\TestCase;
Use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test*/
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->be($user = factory('App\User')->create());

        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->make();

        $this->post($thread->path().'/replies' , $reply->toArray());

        $this->get($thread->path())
                        ->assertSee($reply->body);
    }
}
