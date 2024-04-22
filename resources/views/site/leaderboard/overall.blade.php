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


        <div class="p-6 pt-0">
            <div class="relative w-full overflow-auto">
                <table>
                    <thead>
                        <tr>
                            <th class="no-wrap">Rank</th>
                            <th class="w-full no-wrap">Student</th>
                            <th class="no-wrap">Score</th>
                            <th class="no-wrap"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 10; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
