<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FindTaskTest extends TestCase
{

    use DatabaseMigrations;

    public function testGetTask()
    {
        factory(Task::class)->create();

        $response = $this->get('/api/tasks/1', [
            'Accept' => 'application/json',
        ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'id',
            'description',
            'is_completed',
            'created_at',
            'updated_at',
        ]);
    }

    public function testTaskNotFound()
    {
        $response = $this->get('/api/tasks/1', [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(404);
    }
}
