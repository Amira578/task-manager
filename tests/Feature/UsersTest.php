<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function a_user_object()
    {
        $user=  User::factory()->create();
        $response = $this->get('/api/1/users/'. $user->id);

        $response->assertStatus(200)->assertSee([
            'id' =>$user->id,
            'name'=>$user->name,
        ]);
    }

    /**
     * @test
     */
    public function list_all_users()
    {
        $users=User::factory(10)->create();
        $response=$this->get('/api/1/users/');
        $response->assertStatus(200)->assertSee([
            'id'=> $users->first()->id ,
            'name'=>$users->last()->name,
        ]);

    }

    /**
     * @test
     */
    public function add_new_users()
    {
        $user=[
           // 'id'=> 3,
            'name'=> 'amora',
            'email'=>'hhh@kkkk.com',
            'phone'=>'2809830',
            'password'=>'12345678'
        ];
        $response=$this->post('/api/1/users/',$user);
        $response->assertStatus(201)->assertSee([

            'name'=>'amora',
        ]);

    }
    /**
     * @test
     */
    public function check_add_new_user_validation()
    {
        $user=[
            // 'id'=> 3,
            'name'=> 'amorakjkj',
            'email'=>'fffn@jkkl.com',
            'phone'=>'2809830',
            'password'=>'12345678'
        ];
        $headers=[
      'Content-Type'=>'application/json'
        ];

        $response=$this->post('/api/1/users/',$user, $headers);
        //dd($response->json());
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function update_user_data()
    {
        $user=  User::factory()->create();
        $response = $this->put('/api/1/users/'. $user->id ,[
            'name'=>'Amira'
        ]);

        $response->assertStatus(200)->assertSee([
            'name'=>'Amira',
        ]);
    }
}
