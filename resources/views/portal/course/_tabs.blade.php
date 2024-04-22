<div class="tabs">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <a href="{{ route('portal.course.chapter', $language->id()) }}"
                class="tab-item {{ request()->routeIs('portal.course.chapter') ? 'active' : '' }}">Chapters</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.chapter.create', $language->id()) }}"
                class="tab-item {{ request()->routeIs('portal.chapter.create') ? 'active' : '' }}">New Chapter</a>
        </li>

        <li class="me-2">
            <a href="{{ route('portal.course.student', $language->id()) }}"
                class="tab-item {{ request()->routeIs('portal.course.student') ? 'active' : '' }}">Students</a>
        </li>

        <li class="me-2">
            <a href="{{ route('portal.course.stats', $language->id()) }}"
                class="tab-item {{ request()->routeIs('portal.course.stats') ? 'active' : '' }}">Stats</a>
        </li>
    </ul>
</div>
