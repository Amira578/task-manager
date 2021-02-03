<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserNewRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }
    public function show( User $user){
        return $user;
    }
    public function store( UserNewRequest $request){
       $user= User::create($request->all());
        return $user;
    }
    public function update( Request $request, User $user){
        $user->update($request->all());
        return  $user;
    }
    public function destroy(User $user){
        $user->delete();
        return 'User Deleted';
    }
}

