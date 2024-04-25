@extends('portal.problem._layout')

@section('title')
    {{ $problem->title() }} Expected Output
@endsection

@section('problem_content')
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Problem Expected Output</h3>
            <small class="text-sm text-muted-foreground">The output that is acceptable for the the solution. This will be matched against user
                submissions.</small>
        </div>
        <div class="card-body">
            <form class="grid gap-5" method="post" action="{{ route('portal.problem.output.update', $problem->id()) }}">
                @csrf

                <div class="grid gap-3">
                    <x-input-label for="output" value="Output" />
                    <textarea name="output" rows="10" cols="10">{{ $problem->output() }}</textarea>
                </div>

                <div>
                    <button type="submit" class="btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
