<div class="w-[400px] my-4">
    <div role="tablist" class="tabs w-min">
        <a href="{{ route('portal.chapter.edit', $chapter->id()) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.chapter.edit') ? 'active' : '' }}">Edit Chapter</a>
        <a href="{{ route('portal.chapter.problems', $chapter->id()) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.chapter.problems') ? 'active' : '' }}">View Chapter Problems</a>
    </div>
</div>
