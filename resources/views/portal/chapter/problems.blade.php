<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">{{ $chapter->title() }} Problems</h1>
        <div class="text-sm text-muted-foreground">Editing {{ $chapter->title() }} of {{ $chapter->language->name() }}</div>
    </x-slot>

    @include('portal.chapter._tabs')

    <div class="flex justify-end items-end ml-auto space-x-2 sm:space-x-3 mb-4">
        <a href="{{ route('portal.problem.create', $chapter->id()) }}"class="btn btn-primary">
            <x-icons.plus class="w-5 h-5 mr-2" />
            Add new problem
        </a>
    </div>

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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($problems as $problem)
                            <tr>
                                <td class="w-4/6">
                                    <div>{{ $proble->title() }}</div>
                                </td>
                                <td>
                                </td>
                                <td class="whitespace-nowrap text-xs">
                                    <x-action id="dropdown-problem-action-{{ $language->id() }}">
                                        <a class="action-link" href="">Edit Problem</a>
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
