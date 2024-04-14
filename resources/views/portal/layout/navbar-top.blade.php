<nav
    class="fixed z-30 w-full flex h-9 items-center space-x-1 border bg-background p-1 shadow-sm rounded-none border-b border-none px-2 lg:px-4">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="p-2 rounded cursor-pointer lg:hidden hover:bg-accent focus:bg-accent">
                    <svg id="toggleSidebarMobileHamburger" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="hidden w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="text-sm flex items-center space-x-1">
                    <a href="/" class="flex items-center rounded-sm px-3 py-1 outline-none hover:bg-accent font-bold">uclearncode</a>
                    <a href=""
                        class="hidden lg:block flex items-center rounded-sm px-3 py-1 outline-none hover:bg-accent">Dashboard</a>
                    <a href="{{ route('portal.language.index') }}"
                        class="hidden lg:block flex items-center rounded-sm px-3 py-1 outline-none hover:bg-accent">Languages</a>
                    <a href=""
                        class="hidden lg:block flex items-center rounded-sm px-3 py-1 outline-none hover:bg-accent">Problems</a>
                    <a href=""
                        class="hidden lg:block flex items-center rounded-sm px-3 py-1 outline-none hover:bg-accent">Feedback</a>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button" class="text-sm flex items-center rounded-sm px-3 py-1 outline-none hover:bg-accent"
                            aria-expanded="false" data-dropdown-toggle="user-actions">
                            Account
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="user-actions">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-muted-foreground" role="none">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="text-sm font-medium truncate" role="none">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-accent"
                                    role="menuitem">Settings</a>
                            </li>
                            <li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                        role="menuitem">Log Out</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
