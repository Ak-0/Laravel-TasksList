<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class LivewireSortTable extends Component
{
    public function updateTaskOrder(array $orderedIds): void
    {
        $orderedIds = collect($orderedIds)
            ->map(fn ($id) => (int) $id)
            ->filter()
            ->values()
            ->all();

        Task::reorderFromArray($orderedIds);
    }

    public function removeTask(int $id): void
    {
        Task::whereKey($id)->delete();
    }

    public function render()
    {
        return view('livewire.livewire-sort-table', [
            'tasks' => Task::query()->ordered()->orderBy('id')->get(),
        ]);
    }
}
