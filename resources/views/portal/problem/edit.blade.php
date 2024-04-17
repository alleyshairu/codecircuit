<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">{{ $problem->title() }}</h1>
    </x-slot>

    <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3 mb-5">
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


    @include('portal.problem._tabs')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Problem</h3>
        </div>
        <div class="card-body">
            <form class="grid gap-5" method="post" action="{{ route('portal.problem.update', $problem->id()) }}">
                @csrf

                <div class="grid w-full gap-1.5">
                    <x-input-label for="chapter" value="Chapter" />
                    <x-text-input id="chapter" disabled type="text" value="{{ $problem->chapter->title() }}" />
                </div>

                <div class="grid w-full gap-1.5">
                    <x-input-label for="title" value="Title" />
                    <x-text-input id="title" type="text" name="title" value="{{ $problem->title() }}" required />
                    <x-input-error :messages="$errors->get('title')" />
                </div>

                <div class="grid w-full gap-1.5">
                    <x-input-label for="description" value="Description" />
                    <div data-name="description" class="js-editor-component" data-html="{{ $problem->description() }}"></div>
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div>
                    <button type="submit" class="btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-portal-layout>
