<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Todo;

class UserDeleteTaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_タスクを削除する()
    {
        $todo = Todo::factory()->create();

        $response = $this->delete('/todos/'.$todo->id);

        $this->assertDatabaseMissing('todos', [
            'id' => $todo->id,
        ]);

        $response->assertRedirect('/');

    }
}
