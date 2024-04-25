@extends('site.layout.main')

@section('title')
    Solution
@endsection

@section('content')
    <div class="mx-auto max-w-screen-xl py-8">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-xs text-muted-foreground">{{ $solution->id() }}</div>
                <div class="text-2xl font-bold mb-3">Solution Submission</div>
            </div>
        </div>

        <div class="grid gap-5">
            <fieldset class="rounded-lg border p-4 ">
                <legend class="-ml-1 px-1 text-sm font-medium">Solution Details</legend>
                <div class="grid gap-3">
                    <div>
                        <div class="font-medium">Problem Title</div>
                        <div class="text-sm text-muted-foreground">{{ $problem->title() }}</div>
                    </div>

                    <div>
                        <div class="font-medium">Submitted By</div>
                        <div class="text-sm text-muted-foreground">{{ $student->name }}</div>
                    </div>

                    <div>
                        <div class="font-medium">Solution Submitted</div>
                        <div class="text-sm text-muted-foreground">{{ $solution->created_at->format('Y-m-d') }}</div>
                    </div>
                </div>
            </fieldset>


            <fieldset class="rounded-lg border p-4">
                <legend class="-ml-1 px-1 text-sm font-medium">Problem Description</legend>
                <div>{!! $problem->description() !!}</div>
            </fieldset>


            <fieldset class="rounded-lg border p-4">
                <legend class="-ml-1 px-1 text-sm font-medium">Code Submitted </legend>
                <pre>
                    <code class="language-java">{{ $solution->code() }}</code>
                </pre>
            </fieldset>

            <fieldset class="rounded-lg border p-4">
            <legend class="-ml-1 px-1 text-sm font-medium">Code Output</legend>
                <pre><code class="language-json">{{ json_encode(json_decode($solution->output()), JSON_PRETTY_PRINT) }}</code>
            </fieldset>
        </div>
    @endsection
