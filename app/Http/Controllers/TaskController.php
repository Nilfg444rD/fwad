<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->get();
        return view('tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::with(['category', 'tags'])->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('tasks.create', compact('categories', 'tags'));
    }

    public function store(CreateTaskRequest $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
        ]);
    
        if ($request->has('tags')) {
            $task->tags()->attach($request->tags);
        }
    
        return redirect()->route('tasks.index')->with('success', 'Задача успешно создана!');
    
    }

    public function edit($id)
{
    $task = Task::with('tags')->findOrFail($id);
    $categories = Category::all();
    $tags = Tag::all();

    return view('tasks.edit', compact('task', 'categories', 'tags'));
}

public function update(UpdateTaskRequest $request, $id)
{
    $task = Task::findOrFail($id);
    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'category_id' => $request->category_id,
    ]);

    $task->tags()->sync($request->tags ?? []);

    return redirect()->route('tasks.index')->with('success', 'Задача обновлена!');
}


    
}
