<?php

namespace App\Http\Controllers;

use Validator;
use App\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{

    /**
     *
     */
    public function index()
    {
        $list = Task::paginate();
        $return = $list->toArray();

        $return['meta'] = [
            'per_page' => $return['per_page'],
            'page' => $return['current_page'],
            'total_items' => $return['total'],
            'total_pages' => $return['last_page'],
        ];

        return response()->json($return);
    }


    /**
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['title' => 'required']);
        if ($validator->fails() && $validator->errors()->has('title')) {
            return response()->json([
                'errors' => [
                    'title' => 'Title field is required',
                ],
            ], 422);
        }

        $task = Task::create($request->all());
        $task->refresh();

        return response()->json($task, '201');
    }

    public function show(Task $task)
    {
        return $task;
    }


    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json($task);
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json('', 204);
    }
}
