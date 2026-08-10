<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タスク一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                    + 新規タスク
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg divide-y">
                @forelse ($tasks as $task)
                    <div class="p-4 flex justify-between items-center">
                        <div>
                            <p class="font-bold">{{ $task->title }}</p>
                            <p class="text-sm text-gray-500">
                                状態:
                                @switch($task->status)
                                    @case('todo') 未着手 @break
                                    @case('in_progress') 進行中 @break
                                    @case('done') 完了 @break
                                @endswitch
                                @if ($task->due_date)
                                    ／期限: {{ $task->due_date->format('Y-m-d') }}
                                @endif
                            </p>
                        </div>
                        <div class="space-x-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600">編集</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline"
                                  onsubmit="return confirm('削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">削除</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="p-4 text-gray-500">タスクがありません。</p>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $tasks->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
