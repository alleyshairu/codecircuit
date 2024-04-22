@extends('portal.chapter._layout')

@section('title')
    New Problem For {{ $chapter->title() }}
@endsection

@section('chapter_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Problem</h3>
        </div>
        <div class="card-body">
            <form class="grid gap-5" method="post" action="{{ route('portal.problem.store') }}">
                @csrf

                <div class="grid gap-1.5">
                    <label>Problem Level</label>
                    <select name="problem_level_id">
                        <option></option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->value }}" {{ old('problem_level_id') == $level->value ? 'selected' : '' }}>
                                {{ $level->title() }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid w-full gap-1.5">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" type="text" name="title" :value="old('title')" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="grid w-full gap-1.5">
                    <x-input-label for="description" value="Description" />
                    <div data-name="description" class="js-editor-component" data-html="{{ old('description') }}"></div>
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <input type="hidden" name="chapter_id" value="{{ $chapter->id() }}" />

                <div>
                    <button type="submit" class="btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
