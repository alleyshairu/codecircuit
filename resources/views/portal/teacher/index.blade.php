@section('title')
    Teachers
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Students</h1>
    </x-slot>

    @can('admin')
        <div class="flex items-end ml-auto space-x-2 sm:space-x-3">
            <a href="{{ route('teacher.create') }}"class="btn btn-primary">
                <x-icons.plus class="w-5 h-5 mr-2" />
                New Teacher Account
            </a>
        </div>
    @endcan


    <div class="m-4">
        <form method="get" action="" class="mb-4 flex items-center gap-4">
            <x-text-input name="name" type="text" class="block text-sm w-1/3" placeholder="Teacher name..."
                value="{{ $filters->name }}" />
            <div class="flex items-center justify-end gap-4">
                <button class="btn btn-white" type="submit">
                    <x-icons.search class="w-5 h-5" />
                    Search
                </button>

                <a href="{{ route('teacher.index') }} "class="btn btn-white" type="submit">
                    Clear
                </a>
            </div>
        </form>
    </div>

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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>
                                    <div>{{ $teacher->name() }}</div>
                                </td>
                                <td>0</td>
                                <td>
                                    <x-action id="dropdown-chapter-action-{{ $chapter->id() }}">
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
    @if (count($teachers) === 0)
        <div class="flex flex-col items-center gap-1 text-center my-5">
            <h3 class="text-2xl font-bold tracking-tight">No teachers found</h3>
            <p class="text-sm text-muted">Trying changing the filters</p>
        </div>
    @endif

</x-portal-layout>
