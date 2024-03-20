@foreach (session('flash_notification', collect())->toArray() as $message)
    <div class="my-4 p-4 rounded flex justify-between bg-green-200">
        <div>{!! $message['message'] !!}</div>

        @if($message['important'])
            <button class="ml-2 px-2" onclick="this.parentElement.remove();">&times;</button>
        @endif
</div>
@endforeach
