@extends('site.layout.main')

@section('title')
    Team
@endsection

@section('content')
    <section class="bg-brand-yellow">
        <div class="grid items-center max-w-screen-xl px-4 pt-12 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-2">
            <div>
                <h1 class="max-w-2xl mb-8 text-4xl font-black md:text-5xl xl:text-6xl tracking-wide md:leading-loose">Our Team</h1>
                <div>We are a dynamic team of diverse talents and backgrounds uniting together to create an educational platform for
                    programming.</div>
            </div>
            <div>
                <img src="/images/team.svg" style="height: 420px;" />
            </div>
        </div>
    </section>

    <div class="max-w-screen-xl px-4 pt-16 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16">
        <div class="text-lg font-black text-center my-6">People</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 items-center">
            @foreach ($people as $member)
                <div class="flex flex-1 md:max-w-md items-start gap-4 rounded-lg border border-gray-200 p-5">
                    <div class="">
                        <h3 class="font-extrabold">{{ $member['name'] }}</h3>
                        <p class="text-black/50 text-sm">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-lg font-black text-center my-6">Organization</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 items-center">
            <div class="flex flex-1 md:max-w-md items-start gap-4 rounded-lg border border-gray-200 p-5">
                <img src="images/uc-logo.png" />
            </div>
        </div>
    </div>
@endsection
