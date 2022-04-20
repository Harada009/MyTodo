<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Todo;

class UserDeleteDoneTaskTest extends TestCase
{

    public function test_まとめて完了したタスクを削除()
    {
        // Given
        $task = Todo::factory()->create(['is_done' => true]);

        // When
        $response = $this->post('/done-delete');

        // Then
        $this->assertDatabaseMissing('todos', [
            'id' => $task->id,
        ]);

        $response->assertRedirect('/');

    }
}
