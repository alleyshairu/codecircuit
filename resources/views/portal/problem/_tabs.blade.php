<div class="tabs">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <a href="{{ route('portal.problem.overview', $problem->id()) }}"
                class="tab-item {{ request()->routeIs('portal.problem.overview') ? 'active' : '' }}">Overview</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.problem.edit', $problem->id()) }}"
                class="tab-item {{ request()->routeIs('portal.problem.edit') ? 'active' : '' }}">Details</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.problem.hint', $problem->id()) }}"
                class="tab-item {{ request()->routeIs('portal.problem.hint') ? 'active' : '' }}">Hint</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.problem.code', $problem->id()) }}"
                class="tab-item {{ request()->routeIs('portal.problem.code') ? 'active' : '' }}">Code</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.problem.feedback', $problem->id()) }}"
                class="tab-item {{ request()->routeIs('portal.problem.feedback') ? 'active' : '' }}">Feedback</a>
        </li>
        <li class="me-2">
            <a href="{{ route('portal.problem.stats', $problem->id()) }}"
                class="tab-item {{ request()->routeIs('portal.problem.stats') ? 'active' : '' }}">Stats</a>
        </li>
    </ul>
</div>
