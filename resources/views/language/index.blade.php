<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Courses</h1>
    </x-slot>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col">Language</th>
                                <th scope="col">Color</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($languages as $language)
                                <tr>
                                    <td class="">
                                        <div>{{ $language->name() }}</div>
                                        <div class="text-sm text-gray-500">{{ $language->description() }}</div>
                                    </td>
                                    <td>
                                        <div class="h-2.5 w-2.5 rounded-full" style="background-color: {{ $language->color }}"></div>
                                    </td>
                                    <td>
                                        <a href="{{ route('course.show', $language->id()) }}" class="btn-white">View Syllabus</a>
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
