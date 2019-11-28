<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTaskTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateTask()
    {
        factory(Task::class)->create();

        $response = $this->put('/api/tasks/1', [
            'title' => 'New title',
            'description' => 'New description',
            'is_completed' => true,
        ], [
            'Accept' => 'application/json'
        ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'id',
            'title',
            'description',
            'is_completed',
            'created_at',
            'updated_at',
        ]);

        $response->assertJson([
            'id' => 1,
            'title' => 'New title',
            'description' => 'New description',
            'is_completed' => true,
        ]);
    }
}
