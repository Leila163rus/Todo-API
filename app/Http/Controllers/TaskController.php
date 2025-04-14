<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks=Task::all();
        return TaskResource::collection($tasks); 
    }
    public function show(Request $request)
    {   
        $task=Task::findOrFail($request->id);
        return new TaskResource($task);
    }
    public function create(TaskRequest $rules)
    {
        $task=Task::create($rules->validated());
        return new TaskResource($task);
    }
    public function update(Request $request, TaskRequest $rules)
    {
        Task::findOrFail($request->id)->update($rules->validated());
        $task=Task::findOrFail($request->id);
        return response(['task' => new TaskResource($task), 'message' => 'Update successfully'], 200);
    }
    public function delete(Request $request)
    {
        Task::findOrFail($request->id)->delete();
        return response(['message' => 'Deleted']);
    }
}
