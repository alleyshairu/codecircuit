<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Administrators</h1>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="card-title">Administrators</div>
            </div>
        </div>
        <div class="card-body grid gap-3">
            <div class="relative w-full">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>
                                    <div>{{ $admin->name }}</div>
                                </td>
                                <td>
                                    <x-action id="dropdown-admin-action-{{ $admin->user_id }}">
                                        <a href="{{ route('portal.user.edit', $admin->user_id) }}" class="action-link">Manage Profile</a>
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
