<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Editing {{ $chapter->title() }}</h1>
        <div class="text-sm text-muted-foreground">Editing {{ $chapter->title() }} of {{ $chapter->language->name() }}</div>
    </x-slot>

    @include('portal.chapter._tabs')

    <div class="grid items-center justify-center place-items-center grid-cols-4">
        <div class="card col-span-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Chapter</h3>
                </div>
                <div class="card-body">
                    <form class="grid gap-5" method="post" action="{{ route('portal.chapter.update', $chapter->id()) }}">
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block w-full" type="text" name="title" :value="$chapter->title()" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <div data-name="description" class="js-editor-component" data-html="{{ $chapter->description() }}"></div>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-portal-layout>
