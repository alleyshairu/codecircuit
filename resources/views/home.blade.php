@section('title')
    UCLearn Code
@endsection

<x-guest-layout>
    <section class="bg-brand-yellow">
        <div class="grid max-w-screen-xl px-4 pt-16 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto lg:col-span-7">
                <h1 class="max-w-2xl mb-8 text-4xl font-black md:text-5xl xl:text-6xl tracking-wide md:leading-loose">Challenge Your Java
                    Programming</h1>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <ul class="flex flex-col gap-4">
                        <li class="flex items-center gap-3">
                            <x-icons.check class="w-6 h-6 text-yellow-500" />
                            <p>Challenge yourself anytime for free</p>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-icons.check class="w-6 h-6 text-yellow-500" />
                            <p>Unlimited attempts to solve problems</p>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-icons.check class="w-6 h-6 text-yellow-500" />
                            <p>Byte sized lessons</p>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-icons.check class="w-6 h-6 text-yellow-500" />
                            <p>Instant answers and scores</p>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-icons.check class="w-6 h-6 text-yellow-500" />
                            <p>Earn points</p>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-icons.check class="w-6 h-6 text-yellow-500" />
                            <p>Tips and hints available for the problems</p>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-icons.check class="w-6 h-6 text-yellow-500" />
                            <p>Gain real programming experience</p>
                        </li>
                    </ul>
                </div>
                <div class="my-8">
                    <a href="/login" class="bg-brand-blue text-yellow-200 font-bold px-4 py-2 rounded">Try Now</a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="/images/home-student-lab.webp" alt="university student solving programming problem">
            </div>
        </div>
    </section>

    <section class="bg-brand-yellow">
        <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-16">
            <div class="grid grid-cols-2 gap-8 sm:gap-12 sm:grid-cols-3 lg:grid-cols-4">
                <div class="border border-yellow-600 rounded px-5 py-2">
                    <img src="/images/uc-logo.png" />
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
