<?php

namespace Tests\Unit;

use App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_create_post()
    {
        $post = Post::factory()->create();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
        ]);
    }

    public function test_read_post()
    {
        $post = Post::factory()->create();

        $foundPost = Post::find($post->id);

        $this->assertEquals($post->title, $foundPost->title);
        $this->assertEquals($post->content, $foundPost->content);
    }

    public function test_update_post()
    {
        $post = Post::factory()->create();

        $post->update([
            'title' => 'Updated Title',
            'content' => 'Updated content',
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'content' => 'Updated content',
        ]);
    }

    public function test_delete_post()
    {
        $post = Post::factory()->create();

        $post->delete();

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}
