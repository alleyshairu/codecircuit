@extends('portal.problem._layout')

@section('title')
    {{ $problem->title() }} Hint
@endsection

@section('problem_content')
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Add Hint</h3>
            <small class="text-sm text-muted-foreground">Hint that should be available to students when they attempt to solve the problem</small>
        </div>
        <div class="card-body">
            <form class="grid gap-5" method="post" action="{{ route('portal.problem.hint.update', $problem->id()) }}">
                @csrf

                <div class="grid w-full gap-3">
                    <x-input-label for="hint" value="Hint" />
                    <div data-name="hint" class="js-editor-component" data-html="{{ $problem->hint() }}"></div>
                    <x-input-error :messages="$errors->get('hint')" />
                </div>

                <div>
                    <button type="submit" class="btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
