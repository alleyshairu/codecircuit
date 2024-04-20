<div class="w-full my-4">
    <div role="tablist" class="tabs grid-cols-4">
        <a href="{{ route('portal.course.show', $problem->chapter->language_id) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.course.show') ? 'active' : '' }}">Course</a>

        <a href="{{ route('portal.chapter.edit', $problem->chapter_id) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.chapter.edit') ? 'active' : '' }}">Chapter</a>

        <a href="{{ route('portal.problem.edit', $problem->id()) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.problem.edit') ? 'active' : '' }}">Problem</a>

        <a href="{{ route('portal.problem.feedbacks', $problem->id()) }}" class="tab-item"
            data-state="{{ request()->routeIs('portal.problem.feedbacks') ? 'active' : '' }}">Feedbacks</a>
    </div>
</div>
