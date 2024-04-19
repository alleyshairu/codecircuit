<div class="card">
    <div class="card-header">
        <div class="grid gap-1">
            <h3 class="card-title">Change Name</h3>
            <div class="text-sm text-muted-foreground mt-1">Change user account name</div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" action="{{ route('portal.user.name.update', $id) }}" class="grid gap-4">
            @csrf
            @method('put')

            <div class="grid gap-2">
                <x-input-label for="name" value="Name" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $name }}" />
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
