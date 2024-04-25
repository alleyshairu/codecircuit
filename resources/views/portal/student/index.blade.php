@section('title')
    Students
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Students</h1>
        <small class="text-muted-foreground text-sm">Showing the list of all the students.</small>
    </x-slot>

    <form method="GET" class="bg-background text-sm mb-3">
        <fieldset class="grid md:grid-cols-3 gap-6 rounded-lg border p-4">
            <legend class="-ml-1 px-1 text-sm font-medium">Filters</legend>

            <div class="grid gap-3">
                <label id="name">Name</label>
                <x-text-input for="name" name="name" type="text" value="{{ $filters->name }}" />
            </div>

            <div class="grid gap-3">
                <label>Language</label>
                <select class="" name="language_id">
                    <option></option>
                    @foreach ($languages as $language)
                        <option value="{{ $language->id() }}" {{ $filters->language?->id() == $language->id() ? 'selected' : '' }}>
                            {{ $language->name() }}</option>
                    @endforeach
                </select>
            </div>


            <div class="flex items-end justify-end gap-3">
                <a href="{{ route('portal.student.index') }}" class="btn-white">Clear</a>
                <button class="btn-primary">Search</button>
            </div>
        </fieldset>
    </form>


    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Students</div>
            </div>
        </div>

        <div class="card-body grid gap-3">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>
                                    <div>{{ $student->name }}</div>
                            </td>
                            <td>
                                <div>{{ $student->email }}</div>
                            </td>
                                <td>
                                    <x-action id="dropdown-student-action-{{ $student->id }}">
                                        <a href="{{ route('student.profile', $student->id) }}" class="action-link">View Profile</a>
                                        @can('admin')
                                            <a href="{{ route('portal.user.edit', $student->id) }}" class="action-link">Manage Profile</a>
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
