<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guets_can_not_favorite_anything()
    {
        $this->post('replies/1/favorites')
            ->assertRedirect('/login');
    }


    /** @test */
    public function an_authenticated_user_can_favorite_any_reply()
    {
        $this->signIn();
        $reply = create('App\Reply');
        $this->post('replies/' . $reply->id . '/favorites');

        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_user_may_only_favorite_a_reply_once()
    {
        $this->signIn();

        $reply = create('App\Reply');

        $this->post('replies/' . $reply->id . '/favorites');
        $this->post('replies/' . $reply->id . '/favorites');

        // dd(\App\Favorite::all()->toArray());

        $this->assertCount(1, $reply->favorites);
    }
}
