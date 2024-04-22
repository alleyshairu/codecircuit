@extends('site.layout.main')

@section('title')
    Roadmap
@endsection

@section('content')
<div class="mx-auto max-w-screen-xl py-8">
    <div class="flex items-end justify-end gap-5">
            <div>
                <div class="text-lg font-bold capitalize">Hello, {{ $student->name }}!</div>
                <div class="text-xm text-muted-foreground">This is roadmap of your programming journey. It is showing all the languages that you are
                subscribed to and how much progress you have made. This is your goto destination when you want to get back on track.</div>
        </div>
        <div>
            <a href="/start" class="btn-primary">Change Plan</a>
        </div>
        </div>
        <div class="grid gap-4">
            @foreach ($languages as $language)
                <div class="border-b py-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-black">{{ $language->name() }}</h2>
                            <div class="text-sm text-muted-foreground">Showing your progress for the {{ $language->name() }} course</div>
                        </div>
                        <div class="w-[200px]">
                            @include('site.roadmap._progress', ['percentage' => 0])
                        </div>
                    </div>

                    <div class="grid gap-3">
                        @if ($language->chapters->count() > 0)
                            @foreach ($language->chapters as $chapter)
                                @include('site.roadmap._chapter')
                            @endforeach
                        @else
                            <div class="flex align-items-center justify-center">
                                <div>This course content is not available yet.</div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
