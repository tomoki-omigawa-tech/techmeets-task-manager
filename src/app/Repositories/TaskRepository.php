<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskRepository
{
    // ログインユーザーのタスク一覧を取得
    public function paginateForUser(int $userId, int $perPage = 10): LengthAwarePaginator
    {
        return Task::where('user_id', $userId)->latest()->paginate($perPage);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data): Task
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task): void
    {
        $task->delete();
    }
}
