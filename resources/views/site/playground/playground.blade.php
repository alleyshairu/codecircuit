@extends('site.layout.main')

@section('title')
    Playground
@endsection

@section('content')
    <div class="mx-auto max-w-screen-xl py-8">
        <div class="text-lg font-bold">{{ $problem->title() }}</div>
        <div class="text-xm text-muted-foreground normal-case">Viewing {{ $problem->title() }} of the chapter {{ $chapter->title() }} for
            {{ $language->name() }} programming language.</div>

        <div id="js-playground-component" data-id="{{ $problem->id() }}"></div>
    </div>
@endsection
