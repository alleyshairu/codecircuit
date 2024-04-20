<div class="w-full my-4">
    <div role="tablist" class="tabs grid-cols-3">
        <a href="{{ route('portal.course.show', $chapter->language_id) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.course.show') ? 'active' : '' }}">Course</a>
        <a href="{{ route('portal.chapter.edit', $chapter->id()) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.chapter.edit') ? 'active' : '' }}">Chapter</a>
        <a href="{{ route('portal.chapter.problems', $chapter->id()) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.chapter.problems') ? 'active' : '' }}">Problems</a>
    </div>
</div>
