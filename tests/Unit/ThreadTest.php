<?php

namespace Tests\Unit;

use Tests\TestCase;
Use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{

protected $thread;
use DatabaseMigrations;
public function setUP()
{
    parent::setUp();

    $this->thread = factory('App\Thread')->create();
}

/**  @test */
    function a_thread_has_a_creator()
    {
        $this->assertInstanceOf('App\User',$this->thread->creator);
    }
    /**  @test */
    function a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body'=> 'Foobar',
            'user_id' => 1
        ]);
            $this->assertCount(1,$this->thread->replies);
    }
}
