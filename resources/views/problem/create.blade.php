<x-portal-layout>
    <x-slot name="header">
        <x-course.breadcrumb :language="$chapter->language">
            <x-course.breadcrumb-link link="{{ route('chapter.show', $chapter->id()) }}" title="Chaper - {{ $chapter->title() }}" />
            <x-course.breadcrumb-link link="" title="New Problem" />
        </x-course.breadcrumb>
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">New Problem</h1>
    </x-slot>

    <div class="px-4">
        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 sm:p-6">
            <h3 class="mb-4 text-xl font-semibold dark:text-white">New Problem</h3>

            <form class="grid gap-5" method="post" action="{{ route('problem.store') }}">
                @csrf
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Instructions')" />
                    <x-textarea id="description" class="block mt-1 w-full" name="description">{{ old('Instructions') }}</x-textarea>
                    <x-input-error :messages="$errors->get('instructions')" class="mt-2" />
                </div>

                <input type="hidden" name="chapter_id" value="{{ $chapter->id() }}" />

                <div>
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-portal-layout>
