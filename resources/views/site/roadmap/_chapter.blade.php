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
                        <th class="no-wrap">Level</th>
                        <th class="w-1/2">Problem</th>
                        <th class="no-wrap">Hint Available</th>
                        <th class="no-wrap">Expected Output</th>
                        <th class="no-wrap">Your Feedback</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chapter->problems as $problem)
                        <tr>
                            <td>
                                <div class="badge">{{ $problem->level()->title() }}</div>
                            </td>
                            <td>{{ $problem->title() }}</td>
                            <td>
                                <div class="flex items-center justify-center">
                                    @include('portal.feedback.yes-no', ['check' => null !== $problem->hint()])
                                </div>

                            </td>

                            <td>
                                <div class="flex items-center justify-center">
                                    @include('portal.feedback.yes-no', ['check' => null !== $problem->output()])
                                </div>
                            </td>

                            <td>
                                <div class="flex items-center justify-center">

                                    @if ($feedbacks->get($problem->id()))
                                        @include('portal.feedback.yes-no', ['check' => true])
                                    @else
                                        @include('portal.feedback.yes-no', ['check' => false])
                                    @endif
                                </div>
                            </td>

                            <td>
                                <a class="btn-primary" href="{{ route('playground', $problem->id()) }}">Read</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
