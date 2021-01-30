<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectConroller extends Controller
{
    public function index(){
        return Project::all();
    }
    public function show( Project $project){
        return $project;
    }
    public function store( Request $request){
        $project= Project::create($request->all());
        return $project;
    }
    public function update( Request $request, Project $project){
        $project->update($request->all());
        return  $project;
    }
}
