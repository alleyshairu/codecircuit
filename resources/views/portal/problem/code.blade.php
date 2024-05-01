@extends('portal.problem._layout')

@section('title')
    {{ $problem->title() }} Code
@endsection

@section('problem_content')
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Add Starting Code</h3>
            <small class="text-sm text-muted-foreground">The starting code that students can have for this problem</small>
        </div>
        <div class="card-body">
            <form class="grid gap-5" method="post" action="{{ route('portal.problem.code.update', $problem->id()) }}">
                @csrf

                <div class="grid gap-3">
                    <x-input-label for="code" value="Code" />
                    <textarea name="code" rows="10" cols="10">{{ $problem->code() }}</textarea>
                </div>

                <div>
                    <button type="submit" class="btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
