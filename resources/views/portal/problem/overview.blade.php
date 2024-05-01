@extends('portal.problem._layout')

@section('title')
    {{ $problem->title() }} Problem Overview
@endsection

@section('problem_content')
    <div class="space-y-6">
        <div class="grid grid-cols-3">
            <div>
                <div class="font-medium">Problem ID</div>
                <div class="text-sm text-muted-foreground">{{ $problem->id() }}</div>
            </div>

            <div>
                <div class="font-medium">Chapter</div>
                <div class="text-sm text-muted-foreground">{{ $chapter->title() }}</div>
            </div>

            <div>
                <div class="font-medium">Language</div>
                <div class="text-sm text-muted-foreground">{{ $language->name() }}</div>
            </div>
        </div>
        <div role="none" class="shrink-0 border-b border-border w-full"></div>

        <div>
            <div class="font-medium">Problem Level</div>
            <div class="text-sm text-muted-foreground">{{ $problem->level()->title() }}</div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>

        <div>
            <div class="font-medium">Problem Title</div>
            <div class="text-sm text-muted-foreground">{{ $problem->title() }}</div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">Problem Description</div>
            <div class="text-sm text-muted-foreground">
                <div class="prose">
                    {!! $problem->description() !!}
                </div>
            </div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">Problem Hint</div>
            <div class="text-sm text-muted-foreground">
                <div class="prose">
                    {!! $problem->hint() !!}
                </div>
            </div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">Problem Starting Code</div>
            <pre>
                <code class="language-java">{{ $problem->code() }}</code>
            </pre>
        </div>
    </div>
@endsection
