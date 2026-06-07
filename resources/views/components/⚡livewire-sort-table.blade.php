<?php

use Livewire\Component;
use App\Http\Controllers\Tasks;
use App\Models\Task;

new class extends Component {

    public function handleSort($id, $sort_order)
    {

        $tasks = Task::all();


        $task = $this->list->tasks()->findOrFail($id);

        // Update the task's position and re-order other tasks...
    }
};
