<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todos()->latest()->get();

        return Inertia::render('Todos/Index', [
            'todos' => $todos
        ]);
    }

    public function create()
    {
        return Inertia::render('Todos/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'remind_at' => 'required|date|after:now',
        ]);

        auth()->user()->todos()->create($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo created!');
    }

    public function edit(Todo $todo)
    {
        $this->authorize('update', $todo);

        return Inertia::render('Todos/Edit', ['todo' => $todo]);
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $request->validate([
            'title' => 'required|string|max:255',
            'remind_at' => 'required|date|after:now',
        ]);

        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo updated!');
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted!');
    }
}
