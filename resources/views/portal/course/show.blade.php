@section('title')
    {{ $language->name }} Course
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">{{ $language->name() }} Course</h1>
    </x-slot>

    <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
            <div class="w-full">
                <h3 class="text-base font-normal">Chapers</h3>
                <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">{{ $chapters->count() }}</div>
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

    <div class="p-4">
        <div class="">
            <h3 class="text-lg font-bold mt-5 mb-3">Chapters</h3>
        </div>

        <div class="flex justify-end items-end ml-auto space-x-2 sm:space-x-3">
            <a href="{{ route('chapter.create', $language->id()) }}"class="btn btn-primary">
                <x-icons.plus class="w-5 h-5 mr-2" />
                Add new chapter
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Chapters</div>
            </div>
        </div>
        <div class="card-body">
            <div class="relative w-full overflow-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">No of problems</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chapters as $chapter)
                            <tr>
                                <td class="w-full">
                                    <div>{{ $chapter->title() }}</div>
                                </td>
                                <td>0</td>
                                <td>
                                    <x-action>
                                        <a href="{{ route('chapter.show', $chapter->id()) }}" class="action-link">Edit</a>
                                    </x-action>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-portal-layout>
