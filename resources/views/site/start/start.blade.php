@extends('site.layout.main')

@section('title')
    Get Started
@endsection

@section('content')
    <div class="mx-auto max-w-screen-xl">
        <div class="flex items-center justify-center py-6">
            <div class="w-full text-center text-2xl font-black">Welcome {{ auth()->user()->name }}!</div>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="md:col-span-1">
                @include('site.start._languages')
            </div>

            <div class="md:col-span-1">
                @include('site.start._levels')
            </div>
        </div>

        <div class="flex items-center justify-center my-8">
            <button class="btn-primary">Next</button>
        </div>
    </div>
@endsection
