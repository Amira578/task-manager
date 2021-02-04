<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectNewRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Resources\ProjectListResource;
use App\Http\Resources\ProjectShowResource;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return  ProjectListResource::collection( Project::all());
    }
    public function show( Project $project)
    {
        return ( new ProjectShowResource($project));
    }
    public function store( ProjectNewRequest $request)
    {
        $project= Project::create($request->all());
        return $project;
    }
    public function update( ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->all());
        return  $project;
    }
}
