<?php

namespace Tests\Unit;

use App\Post;
use App\Category;
use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    /**
     * Blog test get all.
     *
     * @return void
     */
    public function testGetAll()
    {
        $this->get(route('blog'))
            ->assertStatus(200);
    }

    /**
     * Test get post by id
     */
    public function testGetPostById()
    {
        $post = factory(Post::class)->create();

        $this->get(route('blog.show', $post->id))
            ->assertStatus(200);
    }

    /**
     * Test get all category
     */
    public function testGetAllCategory()
    {
        $this->get(route('blog.categories'))
            ->assertStatus(200);
    }

    /**
     * Test post by category
     */
    public function testPostByCategoryId()
    {
        $category = factory(Category::class)->create();

        $this->get(route('blog.category.show', $category->id))
            ->assertStatus(200);
    }

    /**
     * Test by search
     */
    public function testSearch()
    {
        $this->get(route('blog.search'))
            ->assertStatus(200);
    }

    /**
     * Test Get Latest
     */
    public function testGetLatest()
    {
        $this->get(route('blog.latest'))
            ->assertStatus(200);
    }
}
