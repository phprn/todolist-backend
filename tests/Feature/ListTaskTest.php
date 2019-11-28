<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListTaskTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testListTask()
    {
        factory(Task::class, 200)->create();

        $response = $this->get('/api/v1/tasks', [
            'Accept' => 'application/json',
        ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'title',
                    'description',
                    'is_completed',
                    'created_at',
                    'updated_at',
                ]
            ],
            'meta' => [
                'per_page',
                'page',
                'total_items',
                'total_pages'
            ],
        ]);
    }
}
