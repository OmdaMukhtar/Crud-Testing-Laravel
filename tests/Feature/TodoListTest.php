<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_todo()
    {
        $user = factory('App\User')->create();

        $todo = factory('App\Todo')->make();

        $this->be($user);

        $this->post('/todo', $todo->toArray());

        $this->get('/todo')
            ->assertSee($todo->title)
            ->assertSee($todo->done);

    }

    /** @test */
    public function an_authenticated_user_can_delete_todo()
    {
        $user = factory('App\User')->create();

        $this->be($user);

        $todo = factory('App\Todo')->create(['user_id' => $user->id]);

        $this->delete('todo/'.$todo->id);

        $this->assertDatabaseMissing('todos', $todo->toArray());
    }

    /** @test */
    public function an_authenticated_user_can_update_todo()
    {
        $user = factory('App\User')->create();

        $this->be($user);

        $todo = factory('App\Todo')->create(['user_id' => $user->id]);

        $this->put('todo/'.$todo->id, [
            'title' => 'my task',
            'done' => 1
        ]);

        tap($todo->fresh(), function($todo){
            $this->assertEquals('my task', $todo->title);
            $this->assertEquals('1', $todo->user_id);
        });

    }

    /** @test */
    public function an_authenticated_user_can_show_his_todo()
    {
        $user = factory('App\User')->create();

        $this->be($user);

        $todo = factory('App\Todo')->create(['user_id' => $user->id]);

        $this->get('todo/'.$todo->id)
            ->assertSee($todo->title)
            ->assertSee($todo->done);
    }

    /** @test */
    public function an_authenticated_user_can_mark_todo_as_done()
    {
        $user = factory('App\User')->create();

        $this->be($user);

        $todo = factory('App\Todo')->create(['done' => 0, 'user_id' => $user->id]);

        $this->post('todo/'.$todo->id.'/markTodo');

        tap($todo->fresh(), function($todo){
            $this->assertEquals(1, $todo->done);
        });

    }

    /** @test */
    public function an_authenticated_user_can_show_all_todo_list()
    {
        $user = factory('App\User')->create();

        $this->be($user);

        $todo1 = factory('App\Todo')->create(['title' => 'first todo', 'user_id' => $user->id]);
        $todo2 = factory('App\Todo')->create(['title' => 'second todo', 'user_id' => $user->id]);
        $todo3 = factory('App\Todo')->create(['title' => 'third todo', 'user_id' => $user->id]);

        $this->get('todo/')
            ->assertSeeText($todo1->title)
            ->assertSeeText($todo2->title)
            ->assertSeeText($todo3->title);

    }

    ////////////////////////////////// Validation fields //////////////////////////////

    /** @test */
    public function a_todo_require_title_to_store()
    {
        $this->withExceptionHandling();

        $user = factory('App\User')->create();

        $this->be($user);

        $todo = factory('App\Todo')->make(['title' => null]);

        $this->post('todo/', $todo->toArray())
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_todo_require_title_to_update()
    {
        $this->withExceptionHandling();

        $user = factory('App\User')->create();

        $this->be($user);

        $todo = factory('App\Todo')->create(['user_id' => $user->id]);

        $this->put('todo/'.$todo->id, ['title' => null])
            ->assertSessionHasErrors('title');
    }
}
