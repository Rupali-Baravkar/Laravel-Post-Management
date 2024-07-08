<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        Storage::fake('public'); // Use fake storage for testing

        $file = UploadedFile::fake()->image('pexels-8moments-1266810.jpg');
        $post = Post::factory()->create([
            'image' => $file->store('images', 'public')
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'image' => 'images/' . $file->hashName(),
        ]);

        Storage::disk('public')->assertExists('images/' . $file->hashName());
    }

    public function test_read_post()
    {
        $post = Post::factory()->create();

        $foundPost = Post::find($post->id);

        $this->assertEquals($post->title, $foundPost->title);
        $this->assertEquals($post->content, $foundPost->content);
        $this->assertEquals($post->image, $foundPost->image);
    }

    public function test_update_post()
    {
        Storage::fake('public'); 

        $file = UploadedFile::fake()->image('pexels-8moments-1266810.jpg');
        $post = Post::factory()->create([
            'image' => $file->store('images', 'public')
        ]);

        $post->update([
            'title' => 'Updated Title',
            'content' => 'Updated content',
            'image' => $file->store('images', 'public'),
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'content' => 'Updated content',
            'image' => 'images/' . $file->hashName()
        ]);
        Storage::disk('public')->assertExists('images/' . $file->hashName());
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
