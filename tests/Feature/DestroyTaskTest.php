<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyTaskTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDestroyTask()
    {
        factory(Task::class)->create();

        $response = $this->delete('/api/task/1', [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(204);
    }

    public function testTaskNotFoundToDestroy()
    {
        $response = $this->delete('/api/task/1', [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(404);
    }
}
