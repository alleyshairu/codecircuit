@section('title')
    {{ $teacher->name }} Teacher Account
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ $teacher->name }} Account</h1>

        <div class="flex justify-end items-end space-x-2">
            <a href="{{ route('portal.teacher.index') }}"class="btn btn-primary">
                <x-icons.search class="w-5 h-5 mr-2" />
                Search Teacher
            </a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-5 items-center justify-center">
        @include('portal.user.partials.update-name', ['id' => $teacher->id, 'name' => $teacher->name])
        @include('portal.user.partials.update-password', ['id' => $teacher->id])
    </div>
</x-portal-layout>
