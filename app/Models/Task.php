<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Atomcoder\LaravelReorderable\Contracts\ReorderableContract;
use Atomcoder\LaravelReorderable\Traits\HasSortOrder;

class Task extends Model implements ReorderableContract
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory, HasSortOrder;

    protected $fillable = [
        'task_name',
        'priority',
        'sort_order',
    ];

    protected string $sortColumn = 'sort_order';

    public function getReorderLabel(): string
    {
        return $this->task_name;
    }
}
