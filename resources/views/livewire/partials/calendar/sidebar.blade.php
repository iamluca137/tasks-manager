<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-[#f8fafd] md:translate-x-0 "
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-4 h-full bg-[#f8fafd]  no-scrollbar">
        {{-- Create Button --}}
        <button type="button"
            class="py-2.5 px-5 mb-2 w-full inline-flex items-center justify-center text-sm font-medium text-gray-900 focus:outline-none rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-teal-600 focus:z-10 focus:ring-4 focus:ring-gray-100      "><i
                class="fa-solid fa-plus me-3"></i>Create</button>
        {{-- Search --}}
        <form action="#" method="GET" class="md:hidden mb-2">
            <label for="sidebar-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                        </path>
                    </svg>
                </div>
                <input type="text" name="search" id="sidebar-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2      "
                    placeholder="Search" />
            </div>
        </form>
        {{-- Mini Calendar --}}
        @livewire('calendar.mini-calendar')
        {{-- My Calendar --}}
        @livewire('calendar.my-calendar')
    </div>
</aside>
