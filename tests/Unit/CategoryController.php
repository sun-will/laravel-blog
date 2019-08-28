<?php

namespace Tests\Unit;

use App\Category;
use App\User;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * Category test get all.
     *
     * @return void
     */
    public function testGetAll()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET', '/category');
        $response->assertStatus(200);
    }

    /**
     * Test if unauthenticated
     */
    public function testUnauthenticated()
    {
        $this->get(route('category'))
            ->assertStatus(302);
    }

    /**
     * Test Save
     */
    public function testSave()
    {
        $data = [
            'cat_name' => 'name',
        ];
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->json('POST', '/category/save', $data);
        $response->assertStatus(200);
    }

    /**
     * Test Update
     */
    public function testUpdate()
    {
        $category = factory(Category::class)->create();

        $data = [
            'cat_name' => 'name',
        ];

        $category = factory(Category::class)->create();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->json('POST', '/category/update/'.$category->id, $data);
        $response->assertStatus(200);
    }

    /**
     * Test Delete
     */
    public function testDelete()
    {
        $category = factory(Category::class)->create();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->json('DELETE', '/category/delete/'.$category->id);
        $response->assertStatus(200);
    }

    /**
     * Test Get by Id
     */
    public function testGetById()
    {
        $category = factory(Category::class)->create();

        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET', '/category/'.$category->id);
        $response->assertStatus(200);
    }
}
