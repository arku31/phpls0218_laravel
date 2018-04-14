<?php

namespace Tests\Unit;

use App\Http\Controllers\PostController;
use App\Post;
use DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        DB::table('posts')->truncate();

        $post = new Post();
        $post->title = 'asd';
        $post->content = 'asdasd';
        $post->user_id = 1;
        $post->save();

        $postController = new PostController();
        $destroy = $postController->destroyAction(1);
        $this->assertTrue($destroy == 1);
    }
}
