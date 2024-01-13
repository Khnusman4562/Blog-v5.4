<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Blog;

class BlogTest extends TestCase
{
    use RefreshDatabase;
    private $payload;

    public function setUp(): void
    {
        parent::setUp();
        factory(Blog::class)->create();
        $this->payload = [
            'title' => 'Blog Title',
            'description' => 'Description about the blog',
        ];
    }

    /** @test */
    function list()
    {
        $this->json('GET', 'api/blogs', [])
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '0' => [
                        'title',
                        'description'
                    ]
                ]
            ]);
        $this->assertCount(1, Blog::all());
    }

    /** @test */
    function add_blog()
    {
      $response =   $this->json('post', 'api/blogs', $this->payload);
      $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'title' => 'Blog Title',
                    'description' => 'Description about the blog',
                ]
            ])
            ->assertJsonStructure([
                'data' => [
                    'title',
                    'description',
                    'updated_at',
                    'created_at',
                    'id',
                ],
                'success'
            ]);
    }

    /** @test */
public function show_single_blog()
{
    $blog = factory(Blog::class)->create();

    $response = $this->json('get', 'api/blogs/' . $blog->id, $this->payload);
    $response->assertStatus(200)
             ->assertJson([
                 'data' => [
                     'title'       => 'Blog Title',
                     'description' => 'Description about the blog',
                 ],
                 'success' => true,
             ])
             ->assertJsonStructure([
                 'data' => [
                     'title',
                     'description',
                     'created_at',
                     'updated_at',
                     'id',
                 ],
                 'success',
             ]);
    return $response;
}

    

    /** @test */
    function edit_blog()
    {
        $this->payload = [
            'title' => 'Blog Update Title',
            'description' => 'too long Description about the blog',
        ];

         $blog = factory(Blog::class)->create();

        $this->json('put', 'api/blogs/' . $blog->id, $this->payload)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'title' => 'Blog Update Title',
                    'description' => 'too long Description about the blog',
                ]
            ])
            ->assertJsonStructure([
                'data' => [
                    'title',
                    'description',
                    'created_at',
                    'updated_at',
                    'id'
                ]
            ]);
    }

    /** @test */

    function destroyBlog()
    {
        $blog = factory(Blog::class)->create();

        $this->json('delete', 'api/blogs/' . $blog->id, [])
            ->assertStatus(204);
            $this->assertDatabaseMissing('blogs', ['id' => $blog->id]);
        }
}
