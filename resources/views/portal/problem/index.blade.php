<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Problems</h1>
        <small class="text-muted-foreground text-sm">Showing the list of all the problems.</small>
    </x-slot>

    <form method="GET" class="bg-background text-sm mb-3">
        <fieldset class="grid md:grid-cols-5 gap-6 rounded-lg border p-4">
            <legend class="-ml-1 px-1 text-sm font-medium">Filters</legend>

            <div class="md:col-span-1 grid gap-3">
                <label>Language</label>
                <select class="w-full" name="language_id">
                    <option></option>
                    @foreach ($languages as $language)
                        <option value="{{ $language->id() }}" {{ $filters->language?->id() == $language->id() ? 'selected' : '' }}>
                            {{ $language->name() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-1 grid gap-3">
                <label>Problem Level</label>
                <select class="w-full" name="problem_level_id">
                    <option></option>
                    @foreach ($levels as $level)
                        <option value="{{ $level->value }}" {{ $filters->level?->value == $level->value ? 'selected' : '' }}>
                            {{ $level->title() }}</option>
                    @endforeach
                </select>
            </div>


            <div class="md:col-span-3 flex items-end justify-end gap-3">
                <a href="{{ route('portal.problem.index') }}" class="btn-white">Clear</a>
                <button class="btn-primary">Search</button>
            </div>
        </fieldset>
    </form>


    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Problems</div>
            </div>
        </div>
        <div class="card-body grid gap-5">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Problem</th>
                            <th class="whitespace-nowrap" scope="col">Language</th>
                            <th class="whitespace-nowrap" scope="col">Difficult Level</th>
                            <th class="whitespace-nowrap" scope="col">Created At</th>
                            <th class="whitespace-nowrap" scope="col">Updated At</th>
                            <th class="whitespace-nowrap" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($problems as $problem)
                            <tr>
                                <td>
                                    <div>{{ $problem->title }}</div>
                                </td>
                                <td>
                                    <div class="badge">{{ $problem->chapter->language->name() }}</div>
                                </td>
                                <td>
                                    <div class="badge">{{ $problem->level()->title() }}</div>
                                </td>
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
