@extends('site.layout.main')

@section('title')
    UCLearnCode
@endsection

@section('content')
    <section class="bg-background">
        <div class="mx-auto max-w-screen-xl px-4 py-12">
            <div class="grid lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <h1 class="mb-8 text-3xl font-black md:text-4xl xl:text-5xl tracking-wide md:leading-loose">Challenge Your Programming
                        Knowledge</h1>
                    <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <ul class="flex flex-col gap-4">
                            <li class="flex items-center gap-3">
                                <x-icons.check class="w-6 h-6 text-green-500" />
                                <p>Challenge yourself anytime for free</p>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-icons.check class="w-6 h-6 text-green-500" />
                                <p>Unlimited attempts to solve problems</p>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-icons.check class="w-6 h-6 text-green-500" />
                                <p>Tips and hints available for the problems</p>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-icons.check class="w-6 h-6 text-green-500" />
                                <p>Instant answers and scores</p>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-icons.check class="w-6 h-6 text-green-500" />
                                <p>Earn points</p>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-icons.check class="w-6 h-6 text-green-500" />
                                <p>Byte sized lessons</p>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-icons.check class="w-6 h-6 text-green-500" />
                                <p>Gain real programming experience</p>
                            </li>
                        </ul>
                    </div>
                    <div class="my-8">
                        <a href="/login" class="btn-primary">Try Now</a>
                    </div>
                </div>
                <div class="hidden lg:mt-0 lg:col-span-4 lg:flex">
                    <img src="/images/home-student-lab.webp" alt="university student solving programming problem" />
                </div>
            </div>

            <div class="flex items-center justify-center">
                <div class="w-48 border rounded px-5 py-2">
                    <img class="" src="/images/uc-logo.png" />
                </div>
            </div>
        </div>
    </section>
@stop
