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
                    <a href="/roadmap" class="btn-primary">Roadmap</a>
                    </a>
                @endif
            </div>
        </div>
    </nav>
</header>
