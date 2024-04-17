<div class="w-1/2 my-4">
    <div role="tablist" class="tabs w-min">
        <a href="{{ route('portal.problem.edit', $problem->id()) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.problem.edit') ? 'active' : '' }}">Edit Problem</a>
    </div>
</div>
