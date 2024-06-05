<x-layout :pageTitle="'Question 1'">

    <div class="w-full h-full flex flex-col items-center my-12">
        <form action="{{ route('add-task') }}" method="POST" class="my-8 p-4 bg-slate-200 shadow-md">
            @csrf
            <h1 class="text-center text-xl my-2">Add new task</h1>
            <input name="task" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="text" placeholder="Task Name" required>
            <input class="h-[50px] bg-blue-500 px-4 py-2 rounded-md text-white" type="submit" value="Add">
        </form>

        <form action="{{ route('search') }}" method="GET" class="my-8 p-4 bg-slate-200 shadow-md">
            <h1 class="text-center text-xl my-2">Search tasks</h1>
            <input name="keyword" class="w-[400px] h-[50px] bg-slate-200 rounded-md px-2 border border-gray-600" type="text" placeholder="Search...">
            <input class="h-[50px] bg-blue-500 px-4 py-2 rounded-md text-white" type="submit" value="Search">
        </form>

        <div class="flex flex-col items-center my-8 gap-8">
            @isset($results)
                @if ($results->count() > 0)
                    @foreach ($results as $result)
                    <div class="w-[500px] border border-gray-600 px-2 py-4 rounded-md shadow-md">
                        <div class="flex justify-between mb-4">
                            <h1 class="text-xl">{{ $result->task }}</h1>
                            <h1 class="bg-gray-600 text-white rounded-md p-1 w-max">{{$result->is_complete == 1 ? 'completed' : 'in progress'}}</h1>
                        </div>
                        
                        <div class="flex justify-end gap-4">
                            <a class="p-1 bg-blue-500 text-white rounded-md" href="{{ route('updatePage', $result->id) }}">Update</a>
                            <form action="{{ route('delete-task', $result->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 bg-red-500 text-white rounded-md">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h1 class="text-center text-2xl">Cannot find anything</h1>
                @endif
            @endisset
        </div>

        <div class="flex flex-col items-center my-8 gap-8">
            @isset($todos)
                @if ($todos->count() > 0)
                    @foreach ($todos as $todo)
                        <div class="w-[500px] border border-gray-600 px-2 py-4 rounded-md shadow-md">
                            <div class="flex justify-between mb-4">
                                <h1 class="text-xl">{{ $todo->task }}</h1>
                                <h1 class="bg-gray-600 text-white rounded-md p-1 w-max">{{$todo->is_complete == 1 ? 'completed' : 'in progress'}}</h1>
                            </div>
                            
                            <div class="flex justify-end gap-4">
                                <a class="p-1 bg-blue-500 text-white rounded-md" href="{{ route('updatePage', $todo->id) }}">Update</a>
                                <form action="{{ route('delete-task', $todo->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 bg-red-500 text-white rounded-md">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1 class="text-center text-2xl">There is nothing to display</h1>
                @endif
            @endisset
        </div>
    </div>

</x-layout>
