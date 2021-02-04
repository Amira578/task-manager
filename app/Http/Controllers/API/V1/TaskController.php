<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }
    public function show( Task $task)
    {
        return $task;
    }
    public function store( Request $request)
    {
        $task= Task::create($request->all());
        return $task;
    }
    public function update( Request $request, Task $task)
    {
        $task->update($request->all());
        return  $task;
    }
}
