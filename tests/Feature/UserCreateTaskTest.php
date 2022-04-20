<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreateTaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_タスクを追加する()
    {
        $response = $this->post('/todos',[
            'title' => 'Hello World',
        ]);

        $this->assertDatabaseHas('todos',[
            'title' => 'Hello World',
            'is_done' => false,
        ]);

        $response->assertRedirect('/');
    }

    public function test_タスクの内容は必須()
    {
        // When
        $response = $this->post('/todos', [
            'title' => '',
        ]);

        // Then
        $response->assertInvalid('title');
    }

}
