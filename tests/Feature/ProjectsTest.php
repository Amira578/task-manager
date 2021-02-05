<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function a_project_object()
    {



        $project=  Project::factory()->create();
        $response = $this->get('/api/1/projects/' . $project->id);
//dd($response->json());
        $response->assertStatus(200)->assertSee([
            'id' =>$project->id,
            'name'=>$project->name,
        ]);
    }

    /**
     * @test
     */
    public function list_all_projects()
    {
        $projects=Project::factory(10)->create();
        $response=$this->get('/api/1/projects/');
        $response->assertStatus(200)->assertSee([
            'id'=> $projects->first()->id ,
            'name'=>$projects->last()->name,
        ]);

    }

    /**
     * @test
     */
    public function add_new_project()
    {
        $project=[
            // 'id'=> 3,
            'name'=> 'Project 1',
            'description'=> "this is a project description"

        ];
        $response=$this->post('/api/1/projects/',$project);
        $response->assertStatus(201)->assertSee([

            'name'=>'Project 1',
        ]);

    }
    /**
     * @test
     */
    public function check_add_new_project_validation()
    {
        $project=[
            // 'id'=> 3,
            'description'=>"description"

        ];
        $headers=[
            'Content-Type'=>'application/json'
        ];

        $response=$this->post('/api/1/projects/',$project, $headers);
        //dd($response->json());
        $response->assertStatus(422)->assertSee(
            [
                'name'=> 'name field is required'
            ]
        );
    }

    /**
     *
     * @test
     * @return void
     */
    public function update_project_data()
    {
        $project=  Project::factory()->create();
        $response = $this->put('/api/1/projects/'. $project->id ,[
            'name'=>'project updated '
        ]);

        $response->assertStatus(200)->assertSee([
            'name'=>'project updated',
        ]);
    }
}
