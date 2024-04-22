@extends('portal.chapter._layout')

@section('title')
    {{ $chapter->title() }} Problems
@endsection

@section('chapter_content')
    <div class="card">
        <div class="card-header">
            <div>
                <div class="card-title">Problems</div>
            </div>
        </div>
        <div class="card-body">
            <div class="relative w-full overflow-auto">
                <table class="table">
                    <thead class="">
                        <tr>
                            <th scope="col w-4/6">Problem</th>
                            <th scope="col">Difficulty Level</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($problems as $problem)
                            <tr>
                                <td class="w-4/6">
                                    <div>{{ $problem->title() }}</div>
                                </td>
                                <td>{{ $problem->level()->title() }}</td>
                                <td>{{ $problem->created_at->format('Y-m-d') }}</td>
                                <td>{{ $problem->updated_at->format('Y-m-d') }}</td>
                                <td>
                                </td>
                                <td class="whitespace-nowrap text-xs">
                                    <x-action id="dropdown-problem-action-{{ $problem->id() }}">
                                        <a class="action-link" href="{{ route('portal.problem.edit', $problem->id()) }}">Edit Problem</a>
                                    </x-action>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
