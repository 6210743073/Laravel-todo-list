<?php

use App\Models\User;
use App\Models\Task;
use Tests\TestCase;

class TodoTest extends TestCase
{
    //use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddTodo()
    {
        $this->visit('/task/create')
            ->type('A New Todo', 'name')
            ->press('Add Task')
            ->seePageIs('/dashboard')
            ->seeInDatabase('/task/{task}', ['description' => 'A New Todo']);
    }
}
