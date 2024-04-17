<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Problems</h1>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Problems</div>
            </div>
        </div>
        <div class="card-body grid gap-5">
            <form method="GET" class="grid gap-3">
                <div class="flex gap-3">
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

                    <div class="grid gap-1.5">
                        <label>Problem Level</label>
                        <select name="problem_level_id">
                            <option></option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->value }}" {{ $filters->level?->value == $level->value ? 'selected' : '' }}>
                                    {{ $level->title() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="ml-auto">
                    <a href="{{ route('portal.problem.index') }}" class="btn-white">Clear</a>
                    <button class="btn-primary">Search</button>
                </div>
            </form>
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Problem</th>
                            <th scope="col">Language</th>
                            <th scope="col">Difficult Level</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($problems as $problem)
                            <tr>
                                <td>
                                    <div>{{ $problem->title }}</div>
                                </td>
                                <td>{{ $problem->chapter->language->name() }}</td>
                                <td>{{ $problem->level()->title() }}</td>
                                <td>{{ $problem->created_at->format('Y-m-d') }}</td>
                                <td>{{ $problem->updated_at->format('Y-m-d') }}</td>
                                <td>
                                    <x-action id="dropdown-problem-action-{{ $problem->id() }}">
                                        <a href="" class="action-link">View Problem</a>
                                        <a href="{{ route('portal.problem.edit', $problem->id()) }}" class="action-link">Edit Problem</a>
                                        <a href="" class="action-link">View Feedback</a>
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
