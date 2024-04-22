@section('title')
    Teachers
@endsection

<x-portal-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h1 class="page-title">Teachers</h1>

    @can('admin')
        <div class="flex items-end justify-end space-x-2">
            <a href="{{ route('portal.teacher.create') }}"class="btn btn-primary">
                <x-icons.plus class="w-5 h-5 mr-2" />
                New Teacher Account
            </a>
        </div>
            @endcan
            </div>

    </x-slot>

    <form method="GET" class="bg-background text-sm mb-3">
        <fieldset class="grid md:grid-cols-2 gap-6 rounded-lg border p-4">
            <legend class="-ml-1 px-1 text-sm font-medium">Filters</legend>

            <div class="grid gap-3">
                <label id="name">Name</label>
                <x-text-input for="name" name="name" type="text" value="{{ $filters->name }}" />
            </div>

            <div class="flex items-end justify-end gap-3">
                <a href="{{ route('portal.teacher.index') }}" class="btn-white">Clear</a>
                <button class="btn-primary">Search</button>
            </div>
        </fieldset>
    </form>


    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Teachers</div>
            </div>
        </div>
        <div class="card-body">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Account Created</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>
                                    <div>{{ $teacher->name }}</div>
                                </td>
                                <td> {{ $teacher->createdAt->format('Y-m-d') }}</td>
                                <td>
                                    <x-action id="dropdown-teacher-action-{{ $teacher->id }}">
                                        @can('admin')
                                            <a href="{{ route('portal.user.edit', $teacher->id) }}" class="action-link">Manage Profile</a>
                                        @endcan
                                    </x-action>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-portal-layout>
