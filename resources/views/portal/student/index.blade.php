<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Students</h1>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Students</div>
            </div>
        </div>
        <div class="card-body">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>
                                    <div>{{ $student->name }}</div>
                                </td>
                                <td>0</td>
                                <td>
                                    <x-action id="dropdown-student-action-{{ $student->id }}">
                                        <a href="" class="action-link">View Profile</a>
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
