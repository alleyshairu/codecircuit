<div class="w-full my-4">
    <div role="tablist" class="tabs grid-cols-2">
        <a href="{{ route('portal.problem.edit', $problem->id()) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.problem.edit') ? 'active' : '' }}">Edit Problem</a>
    </div>
</div>
