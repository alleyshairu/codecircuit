@foreach (session('flash_notification', collect())->toArray() as $message)
    <div class="p-3 my-4 rounded flex justify-between bg-green-200 text-green-800">
        <div>{!! $message['message'] !!}</div>

        @if ($message['important'])
            <button class="ml-2 px-2" onclick="this.parentElement.remove();">&times;</button>
        @endif
    </div>
@endforeach
