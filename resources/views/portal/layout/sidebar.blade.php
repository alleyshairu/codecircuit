<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-9 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="px-3 py-2">
                <h2 class="mb-2 px-4 text-lg font-semibold tracking-tight">Courses</h2>
                <div class="space-y-1">
                    <a href="{{ route('portal.language.index') }}"
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium transition-colors text-secondary-foreground shadow-sm hover:bg-secondary/80 h-9 px-4 py-2 w-full justify-start">
                        <x-icons.book class="mr-2 w-4 h-4" />
                        Languages
                    </a>

                    <a href=""
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium transition-colors text-secondary-foreground shadow-sm hover:bg-secondary/80 h-9 px-4 py-2 w-full justify-start">
                        <x-icons.problem class="mr-2 w-4 h-4" />
                        Problems
                    </a>
                </div>
            </div>

            <div class="px-3 py-2">
                <h2 class="mb-2 px-4 text-lg font-semibold tracking-tight">Students</h2>
                <div class="space-y-1">
                    <a href=""
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium transition-colors text-secondary-foreground shadow-sm hover:bg-secondary/80 h-9 px-4 py-2 w-full justify-start">
                        <x-icons.user class="mr-2 w-4 h-4" />
                        Students
                    </a>

                    <a href=""
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium transition-colors text-secondary-foreground shadow-sm hover:bg-secondary/80 h-9 px-4 py-2 w-full justify-start">
                        <x-icons.feedback class="mr-2 w-4 h-4" />
                        Feedback
                    </a>
                </div>
            </div>

            <div class="px-3 py-2">
                <h2 class="mb-2 px-4 text-lg font-semibold tracking-tight">Links</h2>
                <div class="space-y-1">
                    <a href=""
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium transition-colors text-secondary-foreground shadow-sm hover:bg-secondary/80 h-9 px-4 py-2 w-full justify-start">
                        <x-icons.home class="mr-2 w-4 h-4" />
                        Home
                    </a>

                    <a href=""
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium transition-colors text-secondary-foreground shadow-sm hover:bg-secondary/80 h-9 px-4 py-2 w-full justify-start">
                        <x-icons.github class="mr-2 w-4 h-4" />
                        Github
                    </a>
                </div>
            </div>

            <div class="px-3 py-2">
                <h2 class="mb-2 px-4 text-lg font-semibold tracking-tight">Settings</h2>
                <div class="space-y-1">
                    <a href=""
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium transition-colors text-secondary-foreground shadow-sm hover:bg-secondary/80 h-9 px-4 py-2 w-full justify-start">
                        <x-icons.user class="mr-2 w-4 h-4" />
                        Account
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
