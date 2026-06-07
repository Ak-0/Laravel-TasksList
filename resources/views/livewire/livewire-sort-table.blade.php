<div wire:loading.class="opacity-60">
    <table class="u-full-width table table-hover table-responsive table-striped" style="margin-left: 0;max-width:90%;">
        <thead>
        <tr>
            <td>Actions</td>
            <td>Priority</td>
            <td>Name</td>
            <td>Time</td>
        </tr>
        </thead>
        <tbody data-sortable-tasks>
        @forelse($tasks as $task)
            <tr data-task-id="{{ $task->id }}" wire:key="task-row-{{ $task->id }}" class="backdrop-grayscale-25">
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="button">EDIT</a>
                    <button type="button" class="button js-sort-handle" style="cursor: grab;">
                        SORT
                    </button>
                    <a href="{{ route('tasks.destroy', $task->id) }}" class="button">DELETE</a>
                </td>
                <td>{{ $task->sort_order }}</td>
                <td>{{ $task->task_name }}</td>
                <td><b>{{ $task->created_at ->format('m/d/Y')}}</b></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No tasks found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <p wire:loading wire:target="updateTaskOrder">Saving order...</p>
</div>

@assets
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
@endassets

@script
<script>
    const tableBody = $wire.$el.querySelector('[data-sortable-tasks]');

    const initializeTaskSorter = () => {
        if (! tableBody || tableBody.dataset.sortableBound === 'true') {
            return;
        }

        if (! window.Sortable) {
            window.setTimeout(initializeTaskSorter, 50);
            return;
        }

        tableBody.dataset.sortableBound = 'true';

        new Sortable(tableBody, {
            animation: 150,
            draggable: 'tr[data-task-id]',
            handle: '.js-sort-handle',
            onEnd() {
                const orderedIds = Array.from(tableBody.querySelectorAll('tr[data-task-id]'))
                    .map((row) => row.dataset.taskId);

                $wire.updateTaskOrder(orderedIds);
            },
        });
    };

    initializeTaskSorter();
</script>
@endscript
