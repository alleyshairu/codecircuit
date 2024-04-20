<header class="text-sm">
    <nav class="border-b">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 py-3">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="text-xl font-black lowercase">UCLearnCode</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                @if (!auth()->user())
                    <a href="/login" class="btn-outline">Login</a>
                    <a href="/register" class="uppercase btn-primary">
                        <span>Get Started</span>
                    </a>
                @endif

                @if (auth()->user()?->isStudent())
                    <a href="{{ route('roadmap') }}" class="btn-primary">Roadmap</a>
                    <a href="{{ route('leaderboard') }}" class="btn-white">Leaderboard</a>

                    <details class="relative">
                        <summary>
                            <x-user.avatar name="{{ auth()->user()?->name }}" />
                        </summary>
                        <details-menu role="menu"
                            class="absolute top-12 z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 text-popover-foreground shadow-md w-[200px]">
                            <a class="relative cursor-pointer flex select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none transition-colors hover:bg-accent focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                                href="{{ route('student.profile', auth()->user()->user_id) }}">Profile</a>
                            <div role="separator" aria-orientation="horizontal" class="-mx-1 my-1 h-px bg-muted"></div>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit"
                                    class="relative cursor-pointer w-full flex select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none transition-colors hover:bg-accent focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">Logout</button>
                            </form>
                        </details-menu>
                    </details>
                @endif
            </div>
        </div>
    </nav>
</header>
