@extends('portal.course._layout')

@section('title')
    {{ $language->name }} New Chapter
@endsection

@section('course_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Chapter</h3>
            <div class="text-muted-foreground text-sm">Add a new chapter for the {{ $language->name() }} language.</div>
        </div>
        <div class="card-body">
            <form class="grid gap-5" method="post" action="{{ route('portal.chapter.store') }}">
                @csrf

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
@endsection
