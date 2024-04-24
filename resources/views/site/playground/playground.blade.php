@extends('site.layout.main')

@section('title')
    Playground
@endsection

@section('content')
    <div class="mx-auto max-w-screen-xl py-8">
        <div class="text-xs text-muted-foreground">{{ $problem->id() }}</div>
        <div class="text-2xl font-bold mb-3">{{ $problem->title() }}</div>
        <div class="mb-3 grid gap-2">
            <div class="flex gap-3">
                <div class="badge">{{ $problem->level()->title() }}</div>
                <div class="badge" style="background: {{ $language->color() }} ;">{{ $language->name() }}</div>
                <div class="badge">{{ $chapter->title() }}</div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="font-semibold leading-none tracking-tight">Problem Description</h3>
                    </div>
                    <div class="card-body">
                        {!! $problem->description !!}
                    </div>
                </div>
        </div>

            <div id="js-playground-component" data-id="{{ $problem->id() }}"></div>
        </div>
    @endsection
