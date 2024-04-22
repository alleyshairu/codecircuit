<div class="w-full rounded-full bg-primary/20">
    @if ($percentage > 0)
        <div class="bg-primary text-xs font-medium text-white text-center p-0.5 leading-none rounded-full"
            style="width: {{ $percentage }}%">{{ $percentage }}%</div>
    @else
        <div class="text-xs font-medium text-primary text-center p-0.5 leading-none rounded-full" style="width: 0%">0%</div>
    @endif
</div>
