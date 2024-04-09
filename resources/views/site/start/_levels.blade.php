<div class="card">
    <div class="card-header">
        <h3 class="font-semibold leading-none tracking-tight">Your Skill Level</h3>
        <p class="text-sm text-muted-foreground">Tell us about your programming skill level for better learning experience.</p>
    </div>
    <div class="card-body">
        @foreach ($levels as $level)
            <div>
                <label for="level-{{ $level->value }}"
                    class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                    <div>
                        <p class="text-gray-700">{{ $level->title() }}</p>
                    </div>

                    <input id="level-{{ $level->value }}"type="radio" name="level_id" value="{{ $level->value }}"
                        class="size-5 border-gray-300 text-blue-500" />
                </label>
            </div>
        @endforeach
    </div>

    <div class="card-footer">
        <div class="btn-primary">Save</div>
    </div>
</div>
</fieldset>
