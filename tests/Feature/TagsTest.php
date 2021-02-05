<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TagsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function a_tag_object()
    {



        $tag=  Tag::factory()->create();
        $response = $this->get('/api/1/tags/' . $tag->id);
//dd($response->json());
        $response->assertStatus(200)->assertSee([
            'id' =>$tag->id,
            'name'=>$tag->name,
        ]);
    }

    /**
     * @test
     */
    public function list_all_tags()
    {
        $tags=Tag::factory(10)->create();
        $response=$this->get('/api/1/tags/');
        $response->assertStatus(200)->assertSee([
            'id'=> $tags->first()->id ,
            'name'=>$tags->last()->name,
        ]);

    }

    /**
     * @test
     */
    public function add_new_tag()
    {
        $tag=[
            // 'id'=> 3,
            'name'=> 'tag y',
            'description'=> "this is a tag description"

        ];
        $response=$this->post('/api/1/tags/',$tag);
        $response->assertStatus(201)->assertSee([

            'name'=>'tag y',
        ]);

    }
    /**
     * @test
     */
    public function check_add_new_tag_validation()
    {
        $tag=[
            // 'id'=> 3,
            'description'=>"description"

        ];
        $headers=[
            'Content-Type'=>'application/json'
        ];

        $response=$this->post('/api/1/tags/',$tag, $headers);
        $response->assertStatus(422)->assertSee(
            [
                'name'=> 'name field is required'
            ]
        );
    }

    /**
     * @test
     */
    public function update_tag_data()
    {
        $tag=  Tag::factory()->create();
        $response = $this->put('/api/1/tags/'. $tag->id ,[
            'name'=>'tag updated'
        ]);
//dd($response->json());
        $response->assertStatus(200)->assertSee([
            'name'=>'tag updated',
        ]);
    }
}
