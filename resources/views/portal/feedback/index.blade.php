@section('title')
    Feedbacks
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Feedback</h1>
    </x-slot>

    <form method="GET" class="bg-background text-sm mb-3">
        <fieldset class="grid gap-6 rounded-lg border p-4">
            <legend class="-ml-1 px-1 text-sm font-medium">Filters</legend>


            <div class="flex items-end justify-end gap-3">
                <a href="{{ route('portal.feedback.index') }}" class="btn-white">Clear</a>
                <button class="btn-primary">Search</button>
            </div>
        </fieldset>
    </form>

    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Feedback</div>
            </div>
        </div>
        <div class="card-body grid gap-3">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Problem</th>
                            <th scope="col">Student</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Gained Knowledge?</th>
                            <th scope="col">Was Interesting?</th>
                            <th scope="col">Clear Instructins?</th>
                            <th scope="col">Feedback Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->problem->title() }}</td>
                                <td>{{ $feedback->student->name }}</td>
                                <td>{{ $feedback->score }}</td>
                                <td>@include('portal.feedback.yes-no', ['check' => $feedback->knowledge()])</td>
                                <td>@include('portal.feedback.yes-no', ['check' => $feedback->interesting()])</td>
                                <td>@include('portal.feedback.yes-no', ['check' => $feedback->clearInstructions()])</td>
                                <td>{{ $feedback->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <x-action id="dropdown-feedback-action-{{ $feedback->id() }}">
                                        <a href="{{ route('portal.feedback.show', $feedback->id()) }}" class="action-link">Read</a>
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
