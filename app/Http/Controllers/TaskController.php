<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{

    public function index()
    {
        return Task::all();
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title'       => ['required'],
            'description' => ['required'],
        ]);

        $task = $request->user()->tasks()->create($request->all());

        return response()->json($task,Response::HTTP_CREATED);

    }


    public function show(Task $task)
    {
        //
    }


    public function update(Request $request, Task $task)
    {
        //
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'message'=>'deleted is successfully.'
                                ], Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        $word  = $request->word;
        $tasks = Task::query()->where('title', 'LIKE', '%' . $word . '%')->get();
        return response()->json($tasks);
    }

    public function done(Task $task)
    {
        $task->update([
            'completed'=>!$task->completed
                      ]);
        $task->refresh();
        return response()->json($task,Response::HTTP_OK);
    }
}
