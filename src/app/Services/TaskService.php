<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskService
{
    public function __construct(
        protected TaskRepository $taskRepository
    ) {}

    public function getTasksForUser(int $userId): LengthAwarePaginator
    {
        return $this->taskRepository->paginateForUser($userId);
    }

    public function createTask(array $validated, int $userId): Task
    {
        $validated['user_id'] = $userId;
        return $this->taskRepository->create($validated);
    }

    public function updateTask(Task $task, array $validated): Task
    {
        return $this->taskRepository->update($task, $validated);
    }

    public function deleteTask(Task $task): void
    {
        $this->taskRepository->delete($task);
    }
}
