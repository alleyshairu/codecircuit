<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Feedback</h1>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Feedback</div>
            </div>
        </div>
        <div class="card-body grid gap-3">
            <form method="GET" class="grid gap-3">
                <div class="flex flex-row gap-3">
                    <div class="grid gap-1.5">
                        <label>Language</label>
                        <select name="language_id">
                            <option></option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id() }}" {{ $filters->language?->id() == $language->id() ? 'selected' : '' }}>
                                    {{ $language->name() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <a href="{{ route('portal.feedback.index') }}" class="btn-white">Clear</a>
                    <button class="btn-primary">Search</button>
                </div>
            </form>

            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Problem</th>
                            <th scope="col">Student</th>
                            <th scope="col">Rating</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>
                                    <div></div>
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
</x-portal-layout>
