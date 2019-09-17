<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function an_authenticated_user_should_create_todo()
    {
        $user = factory('App\User')->create();

        $todo = factory('App\Todo')->make(['user_id' => $user->id]);
        
        $this->be($user);
        
        $this->post('/todo', $todo->toArray())
        ->assertSee($todo->title);

    }
}
