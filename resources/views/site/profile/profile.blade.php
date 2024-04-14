@extends('site.layout.main')

@section('title')
    {{ $student->name }} Profile
@endsection

@section('content')
    <div class="mx-auto max-w-screen-xl px-4 py-3">
        <h2 class="text-2xl font-black tracking-tight mb-4">{{ $student->name }}</h2>

        <div class="grid gap-4">
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @include('site.profile._points', ['title' => 'Daily Streak', 'points' => 10])
                @include('site.profile._points', ['title' => 'Total Points Earned', 'points' => 10])
                @include('site.profile._points', ['title' => 'Problem Solved', 'points' => 20])
                @include('site.profile._points', ['title' => 'Feedback Provided', 'points' => 30])
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="font-semibold leading-none tracking-tight">Langauges Learning</h3>
                </div>
                <div class="p-6 pt-0">
                    @include('site.profile._languages')
                </div>
            </div>
        </div>

    </div>
@endsection
