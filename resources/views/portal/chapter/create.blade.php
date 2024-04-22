@section('title')
    New Chapter
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">New Chapter</h1>

        <div class="flex justify-end items-end ml-auto space-x-2 sm:space-x-3">
            <a href="{{ route('portal.course.show', $language->id()) }}"class="btn btn-primary">
                View {{ $language->name() }} Course
            </a>
        </div>
    </x-slot>

    <div class="grid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New Chapter</h3>
                <div class="text-muted-foreground text-sm">Add a new chapter for the {{ $language->name() }} language.</div>
            </div>
            <div class="card-body">
                <form class="grid gap-5" method="post" action="{{ route('portal.chapter.store') }}">
                    @csrf

                    <div class="grid gap-3">
                        <x-input-label for="language" value="Language" />
                        <x-text-input id="language" disabled type="text" value="{{ $language->name() }}" />
                    </div>

                    <div class="grid gap-3">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="w-full block mt-1" type="text" name="title" :value="old('title')" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="grid gap-3">
                        <x-input-label for="description" :value="__('Description')" />
                        <div data-name="description" class="js-editor-component" data-html={{ old('description') }}></div>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <input class="" type="hidden" name="course_id" value="{{ $language->id() }}" />

                    <div>
                        <button type="submit" class="btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-portal-layout>
