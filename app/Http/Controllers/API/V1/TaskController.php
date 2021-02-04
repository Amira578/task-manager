<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskNewRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskListResource;
use App\Http\Resources\TaskShowResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return TaskListResource::collection( Task::all());
    }
    public function show( Task $task)
    {
        return (new TaskShowResource($task));
    }
    public function store( TaskNewRequest $request)
    {
        $task= Task::create($request->all());
        return $task;
    }
    public function update( TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->all());
        return  $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return 'task deleted';
    }
}
