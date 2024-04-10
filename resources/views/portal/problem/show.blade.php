<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ $problem->title() }}</h1>
    </x-slot>

    <div class="px-4">
        <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
                <div class="w-full">
                    <h3 class="text-base font-normal">Solved</h3>
                    <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">0</div>
                    <div class="text-xs text-gray-500">How many students solved this problem</div>
                </div>
            </div>

            <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
                <div class="w-full">
                    <h3 class="text-base font-normal">Success Rate</h3>
                    <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">0</div>
                    <div class="text-xs text-gray-500">Successfully solved / Number of attempts</div>
                </div>
            </div>

        </div>
    </div>
</x-portal-layout>
