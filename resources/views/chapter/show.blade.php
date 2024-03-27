<x-portal-layout>
    <x-slot name="header">
        <x-course.breadcrumb :language="$chapter->language">
            <x-course.breadcrumb-link link="#" title="Chaper - {{ $chapter->title() }}" />
        </x-course.breadcrumb>
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ $chapter->title() }}</h1>
        <small class="text-gray-500">{{ $chapter->description() }}</small>
    </x-slot>

    <div class="p-4">
        <div class="flex items-center justify-between gap-3">
            <h3 class="text-lg font-bold mt-5 mb-3">Problems</h3>
            <div class="flex items-end ml-auto space-x-2 sm:space-x-3">
                <a href="{{ route('problem.create', $chapter->id()) }}" class="btn-primary">
                    <x-icons.plus class="w-5 h-5 mr-2" />
                    Add new Problem
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Hints</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($problems as $problem)
                                <tr>
                                    <td>
                                        <div>{{ $problem->title() }}</div>
                                        <small class="text-muted">{{ $problem->title() }}</small>
                                    </td>
                                    <td>0</td>
                                    <td><a href="{{ route('problem.show', $problem->id()) }}">Edit Problem</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-portal-layout>
