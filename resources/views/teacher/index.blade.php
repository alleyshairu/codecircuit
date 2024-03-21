<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Teachers</h1>

        <div class="flex items-end ml-auto space-x-2 sm:space-x-3">
            <a href="{{ route('teacher.create') }}" class="btn-primary">
                <x-icons.plus class="w-5 h-5 mr-2" />
                Add new teacher
            </a>
        </div>
    </x-slot>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col">Teacher</th>
                                <th scope="col">Actions</th>
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
                                        <a href="" class="btn-white">View Profile</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-portal-layout>
