@section('title')
    {{ $teacher->name }} Teacher Account
@endsection

<x-portal-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ $teacher->name }} Account</h1>

            <div class="flex items-end ml-auto space-x-2 sm:space-x-3">
                <a href="{{ route('teacher.index') }}"class="btn btn-primary">
                    <x-icons.search class="w-5 h-5 mr-2" />
                    Search Teacher
                </a>
            </div>
        </div>
    </x-slot>

    <div>
        @include('user.partials.update-password', ['id' => $teacher->id])
    </div>
</x-portal-layout>
