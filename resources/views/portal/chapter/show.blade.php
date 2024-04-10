<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ $chapter->title() }}</h1>
    </x-slot>

    <div class="p-4">
        <div class="flex items-center justify-between gap-3">
            <h3 class="text-lg font-bold mt-5 mb-3">Problems</h3>
            <div class="flex items-end ml-auto space-x-2 sm:space-x-3">
                <a href="{{ route('problem.create', $chapter->id()) }}" class="btn btn-primary">
                    <x-icons.plus class="w-5 h-5 mr-2" />
                    Add new Problem
                </a>
            </div>
        </div>


        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 sm:p-6">
            <h3 class="mb-4 text-xl font-semibold dark:text-white">New Chapter</h3>

            <form class="grid gap-5" method="post" action="{{ route('chapter.update', $chapter->id()) }}">
                @csrf
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-1/3" type="text" name="title" :value="$chapter->title()" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <div data-name="description" class="js-editor-component" data-html="{{ $chapter->description() }}"></div>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
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
