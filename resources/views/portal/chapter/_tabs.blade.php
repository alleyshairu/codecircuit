<div class="tabs">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <a href="{{ route('portal.chapter.overview', $chapter->id()) }}"
                class="tab-item {{ request()->routeIs('portal.chapter.overview') ? 'active' : '' }}">Overview</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.chapter.edit', $chapter->id()) }}"
                class="tab-item {{ request()->routeIs('portal.chapter.edit') ? 'active' : '' }}">Details</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.chapter.problem', $chapter->id()) }}"
                class="tab-item {{ request()->routeIs('portal.chapter.problem') ? 'active' : '' }}">Problems</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.problem.create', $chapter->id()) }}"
                class="tab-item {{ request()->routeIs('portal.problem.create') ? 'active' : '' }}">New Problem</a>
        </li>
    </ul>
</div>
