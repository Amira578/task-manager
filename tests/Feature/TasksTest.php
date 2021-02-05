<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksTest extends TestCase
{ use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function a_task_object()
    {



        $task=  Task::factory()->create();
        $response = $this->get('/api/1/tasks/' . $task->id);
//dd($response->json());
        $response->assertStatus(200)->assertSee([
            'id' =>$task->id,
            'name'=>$task->name,
        ]);
    }

    /**
     * @test
     */
    public function list_all_tasks()
    {
        $tasks=Task::factory(10)->create();
        $response=$this->get('/api/1/tasks/');
        $response->assertStatus(200)->assertSee([
            'id'=> $tasks->first()->id ,
            'name'=>$tasks->last()->name,
        ]);

    }

    /**
     * @test
     */
    public function add_new_task()
    {
        $task=[
            // 'id'=> 3,
            'name'=> 'Task one',
            'details'=> "this is Task details"

        ];
        $response=$this->post('/api/1/tasks/',$task);
        $response->assertStatus(201)->assertSee([

            'name'=>'Task one',
        ]);

    }
    /**
     * @test
     */
    public function check_add_new_task_validation()
    {
        $task=[
            // 'id'=> 3,
            'details'=>"sub task one: do something"

        ];
        $headers=[
            'Content-Type'=>'application/json'
        ];

        $response=$this->post('/api/1/tasks/',$task, $headers);

        $response->assertStatus(422)->assertSee(
            [
                'name'=> 'name field is required'
            ]
        );
    }

    /**
     * @test
     */
    public function update_task_data()
    {
        $task=  Task::factory()->create();
        $response = $this->put('/api/1/tasks/'. $task->id ,[
            'name'=>'task updated '
        ]);

        $response->assertStatus(200)->assertSee([
            'name'=>'task updated',
        ]);
    }
}
