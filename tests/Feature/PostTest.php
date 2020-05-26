<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
      public function test_a_user_can_view_a_post() {

        $this->withoutExceptionHandling();
        $post = factory("App\Post")->create();

        $this->get("/posts/" . $post->id)
        ->assertSee($post->channel_id)
            ->assertSee($post->title)
            ->asserSee($post->description);

    }
}
