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
        $response = $this->post('/api/tasks', [
            'title' => 'My First task',
        ], [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(201);
    }
}