<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Problems</h1>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Problems</div>
            </div>
        </div>
        <div class="card-body">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Problem</th>
                            <th scope="col">Language</th>
                            <th scope="col">Difficult Level</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($problems as $problem)
                            <tr>
                                <td>
                                    <div>{{ $problem->title}}</div>
                                </td>
                                <td>0</td>
                                <td>0</td>
                                <td>
                                    <x-action id="dropdown-problem-action-{{ $problem->id() }}">
                                        <a href="" class="action-link">View Problem</a>
                                        <a href="" class="action-link">Edit Problem</a>
                                        <a href="" class="action-link">View Feedback</a>
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
