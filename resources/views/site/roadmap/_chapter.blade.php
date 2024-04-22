<div class="card">
    <div class="card-header">
        <div class="flex items-center justify-between">
            <h3 class="font-bold">{{ $chapter->title() }}</h3>
        </div>
    </div>
    <div class="p-6 pt-0">
        <div class="relative w-full">
            <table>
                <thead>
                    <tr>
                        <th class="w-full">Problem</th>
                        <th class="no-wrap">Status</th>
                        <th class="no-wrap">Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chapter->problems as $problem)
                        <tr>
                            <td>{{ $problem->title() }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <x-action id="dropdown-problem-action-{{ $problem->id() }}">
                                    <a class="action-link" href="{{ route('playground', $problem->id()) }}">Open</a>
                                    <a class="action-link" href="{{ route('playground', $problem->id()) }}">Show Feedback</a>
                                </x-action>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
