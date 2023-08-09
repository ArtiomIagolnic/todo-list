<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks;

        return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => [
                'required',
                'max:55',
                'string',
                'unique:' . Tasks::class,
            ],
            'description' => ['required', 'max:100', 'string'],
        ]);

        $user_id = Auth::user()->id;

        $newTask = Tasks::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $user_id,
        ]);

        return response()->json([
            'message' => 'created!',
            'newTask' => [
                'title' => $newTask->title,
                'description' => $newTask->description,
                'id' => $newTask->id,
            ],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Tasks::findOrFail($id);

        return response()->json([
            'title' => $task->title,
            'description' => $task->description,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Tasks::findOrFail($id);

        $validatedData = $request->validate([
            'title' => [
                'required',
                'max:55',
                'string',
                'unique:' . Tasks::class,
            ],
            'description' => ['required', 'max:100', 'string'],
        ]);

        $task->update($validatedData);

        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Tasks $task)
    {
        $task = Tasks::where('id', $task->id)
            ->where('user_id', $user->id)
            ->first();

        if (!$task) {
            response()->json(['message' => 'task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'task deleted']);
    }
}
