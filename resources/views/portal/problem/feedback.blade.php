@extends('portal.problem._layout')

@section('title')
    {{ $problem->title() }} Problem Feedback
@endsection

@section('problem_content')
    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Feedbacks</div>
                <small class="text-sm text-muted-foreground">Feedback provided by students for this problem</small>
            </div>
        </div>
        <div class="card-body grid gap-3">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Student</th>
                            <th scope="col">Rating</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>
                                    {{ $problem->student->name() }}
                                </td>
                                <td></td>
                                <td>
                                    <x-action id="dropdown-feedback-action-{{ $feedback->id() }}">
                                        <a href="{{ route('portal.feedback.show', $feedback->id()) }}" class="action-link">View Feedback</a>
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
