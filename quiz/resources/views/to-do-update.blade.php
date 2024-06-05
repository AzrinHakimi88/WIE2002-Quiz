<x-layout :pageTitle="'Update Task'">
    <div class="flex justify-center">
        <form action="{{ route('update-task', $todo->id) }}" method="POST" class="my-8 p-4 bg-slate-200 shadow-md">
            @csrf
            @method('PUT')
            <h1 class="text-center text-xl my-2">Update Task</h1>
            <input name="task" value="{{ $todo->task }}" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="text" placeholder="Task Name" required>

            <div class="my-2">
                <input type="radio" name="is_complete" value="0" {{ $todo->is_complete == 0 ? 'checked' : '' }}>
                <label for="in_progress">In Progress</label>
            </div>
            <div class="my-2">
                <input type="radio" name="is_complete" value="1" {{ $todo->is_complete == 1 ? 'checked' : '' }}>
                <label for="completed">Completed</label>
            </div>

            <input class="h-[50px] bg-blue-500 px-4 py-2 rounded-md text-white" type="submit" value="Update">
        </form>
    </div>
</x-layout>
