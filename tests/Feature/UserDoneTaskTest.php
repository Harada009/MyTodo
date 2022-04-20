<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Todo;

class UserDoneTaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_タスクを完了する()
    {
        $todo = Todo::factory()->create();

        $response = $this->post('/todos/'.$todo->id);

        $this->assertDatabaseHas('todos',[
            'is_done' => true,
        ]);

        $response->assertRedirect('/');
    }
}
