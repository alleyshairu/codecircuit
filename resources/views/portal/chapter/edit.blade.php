@extends('portal.chapter._layout')

@section('title')
    {{ $chapter->title() }} Edit
@endsection

@section('chapter_content')
    <div class="card">
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
@endsection
