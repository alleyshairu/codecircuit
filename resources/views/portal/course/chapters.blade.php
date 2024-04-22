@extends('portal.course._layout')

@section('title')
    {{ $language->name }} Course
@endsection

@section('course_content')
    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Chapters</div>
            </div>
        </div>
        <div class="card-body">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="w-full" scope="col">Title</th>
                            <th class="whitespace-nowrap" scope="col">No of problems</th>
                            <th class="whitespace-nowrap" scope="col">Date Created</th>
                            <th class="whitespace-nowrap" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chapters as $chapter)
                            <tr>
                                <td>
                                    <div>{{ $chapter->title() }}</div>
                                </td>
                                <td class="no-wrap">{{ $chapter->problems_count }}</td>
                                <td>{{ $chapter->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <x-action id="dropdown-chapter-action-{{ $chapter->id() }}">
                                        <a href="{{ route('portal.chapter.overview', $chapter->id()) }}" class="action-link">Overview</a>
                                        <a href="{{ route('portal.chapter.edit', $chapter->id()) }}" class="action-link">Edit</a>
                                        <a href="{{ route('portal.chapter.problem', $chapter->id()) }}" class="action-link">Problems</a>
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
