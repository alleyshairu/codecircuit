<x-portal-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Student Feedback</h1>
        <small class="text-gray-500">Showing all the feedbacks provided by students for a particular problem</small>
    </x-slot>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col">Feedback#</th>
                                <th scope="col">Student</th>
                                <th scope="col">Problem</th>
                                <th scope="col">Rating</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-portal-layout>
