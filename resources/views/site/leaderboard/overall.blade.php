@extends('site.layout.main')

@section('title')
    Leaderboard
@endsection

@section('content')
    <div class="mx-auto max-w-screen-xl py-8">
        <div class="flex flex-col items-center">
            <div class="text-2xl font-bold">Leaderboard</div>
            <div class="text-xm text-muted-foreground">Showing the list of top performing students.</div>
        </div>

        <div class="p-6 pt-0 mt-5 flex items-center justify-center">
            <div class="relative md:w-2/4 overflow-auto">
                <table>
                    <thead>
                        <tr>
                            <th class="no-wrap">Rank</th>
                            <th class="no-wrap">Student</th>
                            <th class="no-wrap">Score</th>
                            <th class="no-wrap text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->points }}</td>
                                <td>
                                    <div class="flex items-end justify-end">
                                        <a href="{{ route('student.profile', $student->user_id) }}" class="btn-primary">View Profile</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
