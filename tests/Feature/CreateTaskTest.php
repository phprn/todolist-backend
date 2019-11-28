<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateTask()
    {
        $response = $this->post('/api/v1/tasks', [
            'title' => 'My first task',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'title',
            'description',
            'is_completed',
            'created_at',
            'updated_at',
        ]);
    }

    public function testErrorCreateTask()
    {
        $response = $this->post('/api/v1/tasks', [
            'description' => 'My task description'
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'errors' => [
                'title'
            ]
        ]);
    }

    public function testCreateTaskWithFullData()
    {
        $response = $this->post('/api/v1/tasks', [
            'title' => 'My first task',
            'description' => 'My first task description',
            'is_completed' => false,
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'title',
            'description',
            'is_completed',
            'created_at',
            'updated_at',
        ]);
        $response->assertJson([
            'title' => 'My first task',
            'description' => 'My first task description',
            'is_completed' => false,
        ]);
    }
}
