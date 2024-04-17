<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Students</h1>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Students</div>
            </div>
        </div>
        <div class="card-body grid gap-3">
            <form method="GET" class="grid gap-3">
                <div class="flex gap-3">
                    <div class="grid gap-1.5">
                        <label id="name">Name</label>
                        <x-text-input for="name" name="name" type="text" value="{{ $filters->name }}" />
                    </div>


                    <div class="grid gap-1.5">
                        <label>Language</label>
                        <select name="language_id">
                            <option></option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id() }}" {{ $filters->language?->id() == $language->id() ? 'selected' : '' }}>
                                    {{ $language->name() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="ml-auto">
                    <a href="{{ route('portal.student.index') }}" class="btn-white">Clear</a>
                    <button class="btn-primary">Search</button>
                </div>
            </form>

            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>
                                    <div>{{ $student->name }}</div>
                                </td>
                                <td>0</td>
                                <td>
                                    <x-action id="dropdown-student-action-{{ $student->id }}">
                                        <a href="" class="action-link">View Profile</a>
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
