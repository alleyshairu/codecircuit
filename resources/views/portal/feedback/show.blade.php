@section('title')
    Feedback
@endsection

<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Feedback</h1>
    </x-slot>

    <div class="space-y-6">
        <div class="grid grid-cols-3">
            <div>
                <div class="font-medium">Feedback ID</div>
                <div class="text-sm text-muted-foreground">{{ $feedback->id() }}</div>
            </div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">Score Given</div>
            <div class="text-sm text-muted-foreground">{{ $feedback->score() }} / 5</div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div class="grid grid-cols-3">
            <div>
                <div class="font-medium">You gained new knowledge?</div>
                @include('portal.feedback.yes-no', ['check' => $feedback->knowledge()])
            </div>

            <div>
                <div class="font-medium">Are instruction clear?</div>
                @include('portal.feedback.yes-no', ['check' => $feedback->clearInstructions()])
            </div>

            <div>
                <div class="font-medium">Was problem interesting?</div>
                @include('portal.feedback.yes-no', ['check' => $feedback->interesting()])
            </div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">Feedback</div>
            <div class="text-sm text-muted-foreground">{{ $feedback->feedback() }}</div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">By</div>
            <div class="text-sm text-muted-foreground">{{ $feedback->student?->name }}</div>
        </div>

        <div role="none" class="shrink-0 border-b border-border w-full"></div>
        <div>
            <div class="font-medium">Problem</div>
            <div class="text-sm text-muted-foreground">{{ $feedback->problem->title() }}</div>
        </div>
    </div>
</x-portal-layout>
