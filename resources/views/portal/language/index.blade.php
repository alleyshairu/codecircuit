<x-portal-layout>
    <x-slot name="header">
        <h1 class="page-title">Languages</h1>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div>
                <div class="card-title">Languages</div>
            </div>
        </div>
        <div class="card-body">
            <div class="relative w-full overflow-auto">
                <table class="table">
                    <thead class="">
                        <tr>
                            <th scope="col w-4/6">Language</th>
                            <th scope="col">Color</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($languages as $language)
                            <tr>
                                <td class="w-4/6">
                                    <div>{{ $language->name() }}</div>
                                    <div class="text-sm text-gray-500">{{ $language->description() }}</div>
                                </td>
                                <td>
                                    <div class="h-2.5 w-2.5 rounded-full" style="background-color: {{ $language->color }}"></div>
                                </td>
                                <td class="whitespace-nowrap text-xs">
                                    <x-action id="dropdown-language-action-{{ $language->id() }}">
                                        <a class="action-link" href="{{ route('portal.course.show', $language->id()) }}">View Course</a>
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
