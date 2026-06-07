<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use Symfony\Component\Console\Input\Input;
use Livewire\Component;

class Tasks extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retrieve and show current tasks from the model
        $tasks = Task::all();
        return view('tasks.index')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //add new task to the db
        if ($request->input()){
            $data = $request->validate(
                [
                    'task_name' => 'required|string|max:100',
                    'priority' => 'required|string|max:2'
                ]);
            if($data){
                Task::create(['task_name'=>$data['task_name'], 'priority'=>$data['priority']]);
                return redirect()->route('tasks.index')->with('message','Task has been saved.');
            }
            else {
                return redirect()->route('tasks.index')->with('message','Task was not validated. NOT CREATED');

            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('tasks.edit')->with('task',Task::query()->findSole($id));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //edit the task
        if ($request->input()) {
            $data = $request->validate(
                [
                    'task_name' => 'required|string|max:100',
                    'priority' => 'required|string|max:2'
                ]);
        }
        if ($data) {
            $update_action = Task::where('id', $request->id)->update(['task_name' => $request->task_name, 'sort_order' => $request->priority]);
            if ($update_action) {
                return redirect()->route('tasks.index')->with('message', 'Task has been saved.');
            } else {
                return redirect()->route('tasks.index')->with('message', 'Task was NOT UPDATED');
            }

        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = Task::destroy($id);
        if($result){
            return redirect()->route('tasks.index')->with('message', 'Task was DELETED');;
        }
        }
    public function sort(Task $task)
    {
        $tasks = Task::query()
            ->where('tasks.id', $task->id)
            ->ordered()
            ->get();
        return view('tasks.index')->with('tasks',$tasks);

    }
    public function __invoke(Task $task): View
    {
        $tasks = $task->tasks()
            ->ordered()
            ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
}

