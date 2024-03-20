<x-portal-layout>
    <x-slot name="header">
        <x-course.breadcrumb :language="$language"></x-course.breadcrumb>
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ $language->name() }} Course</h1>
    </x-slot>

    <div class="px-4">
        <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
                <div class="w-full">
                    <h3 class="text-base font-normal">Chapers</h3>
                    <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">0</div>
                    <div class="text-xs text-gray-500">Total numbers of chapters added for this course</div>
                </div>
            </div>

            <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
                <div class="w-full">
                    <h3 class="text-base font-normal">Students</h3>
                    <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">0</div>
                    <div class="text-xs text-gray-500">Total numbers of students following this course</div>
                </div>
            </div>

            <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
                <div class="w-full">
                    <h3 class="text-base font-normal">Problems</h3>
                    <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">0</div>
                    <div class="text-xs text-gray-500">Total numbers of problems in this course</div>
                </div>
            </div>
        </div>

    </div>
    <div class="p-4">
        <div class="flex items-center justify-between gap-3">
        <h3 class="text-lg font-bold mt-5 mb-3">Chapters</h3>
        <div class="flex items-end ml-auto space-x-2 sm:space-x-3">
            <a href="{{ route('chapter.create', $language->id()) }}"class="btn-primary">
                <x-icons.plus class="w-5 h-5 mr-2" />
                Add new chapter
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
                            <th scope="col">No of problems</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($chapters as $chapter)
                            <tr>
                                <td>
                                    <div>{{ $chapter->title() }}</div>
                                    <small class="text-gray-500">{{ $chapter->description}}</small>
                                </td>
                                <td>0</td>
                                <td>
                                    <a href="{{ route('chapter.show', $chapter->id()) }}"class="btn-white">Edit Chapter</a>
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
