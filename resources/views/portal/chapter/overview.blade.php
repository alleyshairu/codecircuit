@extends('portal.chapter._layout')

@section('title')
    {{ $chapter->title() }} Chapter Overview
@endsection

@section('chapter_content')
    <div class="space-y-6">
        <div>
            <div class="font-medium">Language</div>
            <div class="text-sm text-muted-foreground">{{ $chapter->language->name() }}</div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div class="grid grid-cols-3">
            <div>
                <div class="font-medium">Chapter ID</div>
                <div class="text-sm text-muted-foreground">{{ $chapter->id() }}</div>
            </div>

        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">Chapter Title</div>
            <div class="text-sm text-muted-foreground">{{ $chapter->title() }}</div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">Chapter Descriptipn</div>
            <div class="text-sm text-muted-foreground">{!! $chapter->description() !!}</div>
        </div>
    </div>
@endsection
