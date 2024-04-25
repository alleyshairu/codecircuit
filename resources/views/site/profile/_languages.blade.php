    <div class="relative w-full overflow-auto">
        <table class="w-full caption-bottom text-sm">
            <thead class="[&_tr]:border-b">
                <tr class="border-b transition-colors hover:bg-muted/50">
                    <th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground" colspan="1">Language</th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground" colspan="1">Status</th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground" colspan="1">Progress</th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground" colspan="1">Start Date</th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground" colspan="1">Want To Complete Date</th>
                </tr>
            </thead>
            <tbody class="[&_tr:last-child]:border-0">
                @foreach ($courses as $course)
                    <tr class="border-b transition-colors hover:bg-muted/50">
                        <td class="p-2 align-middle">
                            <div>{{ $course->name() }}</div>
                        </td>
                        <td>
                            <div>Learning</div>
                        </td>
                        <td>
                            <div>{{ $progress[$course->id()] ?? 0}}%</div>
                        </td>
                        <td>
                            <div>30 April, 2024</div>
                        </td>
                        <td>
                            <div>01 August, 2024</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
