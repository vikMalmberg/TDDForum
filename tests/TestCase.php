<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        // if user is null create a user
        $user = $user ?: create('App\User');

        $this->actingAs($user);

        return $this;
    }
}
