@section('title')
    Solutions
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Solutions</h1>
        <small class="text-muted-foreground text-sm">Showing the list stuednts submitted solutions.</small>
    </x-slot>

    <form method="GET" class="bg-background text-sm mb-3">
        <fieldset class="grid md:grid-cols-5 gap-6 rounded-lg border p-4">
            <legend class="-ml-1 px-1 text-sm font-medium">Filters</legend>

            <div class="md:col-span-3 flex items-end justify-end gap-3">
                <a href="{{ route('portal.solution.index') }}" class="btn-white">Clear</a>
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
                            <th class="whitespace-nowrap" scope="col">Student</th>
                            <th class="whitespace-nowrap" scope="col">Submission Date</th>
                            <th class="whitespace-nowrap" scope="col">Last Updated Date</th>
                            <th class="whitespace-nowrap" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solutions as $solution)
                            <tr>
                                <td>
                                    <div>{{ $solution->problem->title }}</div>
                                </td>
                                <td>
                                    {{ $solution->student->name }}
                                </td>

                                <td>{{ $solution->created_at->format('Y-m-d') }}</td>
                                <td>{{ $solution->updated_at->format('Y-m-d') }}</td>
                                <td>
                                    <x-action id="dropdown-problem-action-{{ $solution->id() }}">
                                        <a href="{{ route('solution.show', $solution->id()) }}" class="action-link">View
                                            Solution</a>
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
