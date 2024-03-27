@section('title')
    Teachers
@endsection

<x-portal-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <div>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Teachers</h1>
                <p class="text-sm text-muted">Manage teachers accounts</p>
            </div>
            <div class="flex items-end ml-auto space-x-2 sm:space-x-3">
                <a href="{{ route('teacher.create') }}"class="btn btn-primary">
                    <x-icons.plus class="w-5 h-5 mr-2" />
                    New Teacher Account
                </a>
            </div>
        </div>
    </x-slot>

    <div class="m-4">

        <form method="get" action="" class="mb-4 flex items-center gap-4">
            <x-text-input name="name" type="text" class="block w-full" placeholder="teacher name..." value="{{ $filters->name }}" />
            <button class="btn btn-white" type="submit">
                <x-icons.search class="w-5 h-5" />
                Search
            </button>

            <a href="{{ route('teacher.index') }} "class="btn btn-white" type="submit">
                Clear
            </a>
        </form>
    </div>


    <div class="m-4 border rounded-md">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="w-full">Teacher</th>
                                <th scope="col" class="whitespace-nowrap">Created At</th>
                                <th scope="col" class="whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td class="">
                                        <div>{{ $teacher->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $teacher->email }}</div>
                                    </td>
                                    <td>
                                        {{ $teacher->createdAt->format('Y-m-d') }}
                                    </td>
                                    <td class="justify-end">
                                        <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-white">View Profile</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if (count($teachers) === 0)
        <div class="flex flex-col items-center gap-1 text-center my-5">
            <h3 class="text-2xl font-bold tracking-tight">No teachers found</h3>
            <p class="text-sm text-muted">Trying changing the filters</p>
        </div>
    @endif

</x-portal-layout>
