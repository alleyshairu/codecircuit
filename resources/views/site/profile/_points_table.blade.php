    <div class="relative w-full overflow-auto">
        <table class="w-full caption-bottom text-sm">
            <thead class="[&_tr]:border-b">
                <tr class="border-b transition-colors hover:bg-muted/50">
                    <th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground" colspan="1">Event</th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground" colspan="1">Points</th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground" colspan="1">Date</th>
                </tr>
            </thead>
            <tbody class="[&_tr:last-child]:border-0">
                @foreach ($events as $event)
                    <tr class="border-b transition-colors hover:bg-muted/50">
                        <td>{{ $event->event }}</td>
                        <td>{{ $event->points_earned }}</td>
                        <td>{{ \Illuminate\Support\Carbon::parse($event->created_at)->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
