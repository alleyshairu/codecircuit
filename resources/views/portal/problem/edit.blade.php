@extends('portal.problem._layout')

@section('title')
    {{ $problem->title() }} Problem Overview
@endsection

@section('problem_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Problem</h3>
            <small class="text-sm text-muted-foreground">Update problem basic details</small>
        </div>
        <div class="card-body">
            <form class="grid gap-5" method="post" action="{{ route('portal.problem.update', $problem->id()) }}">
                @csrf
                <div class="grid gap-3">
                    <label>Problem Level</label>
                    <select name="problem_level_id">
                        <option></option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->value }}" {{ $problem->level()->value == $level->value ? 'selected' : '' }}>
                                {{ $level->title() }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid w-full gap-3">
                    <x-input-label for="title" value="Title" />
                    <x-text-input id="title" type="text" name="title" value="{{ $problem->title() }}" required />
                    <x-input-error :messages="$errors->get('title')" />
                </div>

                <div class="grid w-full gap-3">
                    <x-input-label for="description" value="Description" />
                    <div data-name="description" class="js-editor-component" data-html="{{ $problem->description() }}"></div>
                    <x-input-error :messages="$errors->get('description')" />
                </div>
                <div>
                    <button type="submit" class="btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
