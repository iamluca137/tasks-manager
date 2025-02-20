<nav class=" bg-[#f8fafd] px-4 py-2.5 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100  focus:ring-2 focus:ring-gray-100">
                <svg aria-hidden="false" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            <a href="{{ route('calendar') }}" class="hidden md:flex items-center justify-between mr-4">
                <span class="self-center text-2xl font-semibold whitespace-nowrap ">Tasks
                    Manager</span>
            </a>
            <div class="flex md:ml-10 items-center justify-between gap-3">
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-6">
                        <button wire:click="gotoToday"
                            class="flex py-2 pl-1.5 pr-3 rounded-md bg-gray-50 border border-gray-300 items-center gap-1.5 text-xs font-medium text-gray-900 transition-all duration-500 hover:bg-gray-100">
                            <i class="fa-solid fa-calendar-days text-gray-500"></i>Today
                        </button>
                        <button wire:click.debounce.0ms="previousMonth"
                            class="text-gray-500 rounded flex items-center transition-all duration-300 hover:bg-gray-100 hover:text-gray-900">
                            <i class="fa-solid fa-chevron-left fa-xs text-gray-500 hover:text-gray-400"></i>
                        </button>
                        <button wire:click.debounce.0ms="nextMonth"
                            class="text-gray-500 rounded flex items-center transition-all duration-300 hover:bg-gray-100 hover:text-gray-900">
                            <i class="fa-solid fa-chevron-right fa-xs text-gray-500 hover:text-gray-400"></i>
                        </button>
                    </div>
                    <h5 class="text-xl leading-8 font-semibold text-gray-900">{{ $nameOfMonth }}</h5>
                </div>
            </div>
        </div>
        <div class="flex items-center lg:order-2">
            <div>
                <button
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-800 hover:text-gray-900 rounded-md bg-gray-50 border border-gray-300 transition-all duration-500 hover:bg-gray-100"
                    type="button" data-dropdown-toggle="weekly-sales-dropdown">Month<svg class="w-4 h-4 ml-2"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow  "
                    id="weekly-sales-dropdown"
                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(355.556px, 706.667px);"
                    data-popper-placement="bottom">
                    <ul class="py-1" role="none">
                        @foreach ($viewModes as $mode)
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">{{ ucfirst($mode) }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="py-1" role="none">
                        <li>
                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                                data-dropdown-placement="right-start" type="button"
                                class="flex items-center justify-between px-4 py-2 text-gray-700 hover:bg-gray-100 text-sm">Number
                                of days<svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg></button>
                            <div id="doubleDropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                                    @foreach ($fixedDayCounts as $day)
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">{{ $day }} days</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">Other...</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Search --}}
            <form action="#" method="GET" class="hidden lg:block md:pl-2">
                <label for="topbar-search" class="sr-only">Search</label>
                <div class="relative md:w-64">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-500 "></i>
                    </div>
                    <input type="text" name="email" id="topbar-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                        placeholder="Search" />
                </div>
            </form>
            <!-- Notifications -->
            <button type="button" data-dropdown-toggle="notification-dropdown"
                class="p-2 mx-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 ">
                <span class="sr-only">View notifications</span>
                <!-- Bell icon -->
                <i class="fa-solid fa-bell fa-lg"></i>
            </button>
            <!-- Dropdown menu -->
            <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg rounded-xl"
                id="notification-dropdown">
                <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 ">
                    Notifications
                </div>
                <div>
                    <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                        <div class="flex-shrink-0">
                            <img class="w-11 h-11 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                alt="Bonnie Green avatar" />
                            <div
                                class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 ">
                                <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                    </path>
                                    <path
                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="text-gray-500 font-normal text-sm mb-1.5">
                                New message from
                                <span class="font-semibold text-gray-900 ">Bonnie Green</span>:
                                "Hey, what's up? All set for the presentation?"
                            </div>
                            <div class="text-xs font-medium text-primary-600">
                                a few moments ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100">
                        <div class="flex-shrink-0">
                            <img class="w-11 h-11 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="Jese Leos avatar" />
                            <div
                                class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white ">
                                <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="text-gray-500 font-normal text-sm mb-1.5 ">
                                <span class="font-semibold text-gray-900 ">Jese leos</span>
                                and
                                <span class="font-medium text-gray-900 ">5 others</span>
                                started following you.
                            </div>
                            <div class="text-xs font-medium text-primary-600 ">
                                10 minutes ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                        <div class="flex-shrink-0">
                            <img class="w-11 h-11 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                                alt="Joseph McFall avatar" />
                            <div
                                class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white ">
                                <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="text-gray-500 font-normal text-sm mb-1.5 ">
                                <span class="font-semibold text-gray-900 ">Joseph Mcfall</span>
                                and
                                <span class="font-medium text-gray-900 ">141 others</span>
                                love your story. See it and view more stories.
                            </div>
                            <div class="text-xs font-medium text-primary-600 ">
                                44 minutes ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                        <div class="flex-shrink-0">
                            <img class="w-11 h-11 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                                alt="Roberta Casas image" />
                            <div
                                class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white ">
                                <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="text-gray-500 font-normal text-sm mb-1.5 ">
                                <span class="font-semibold text-gray-900 ">Leslie
                                    Livingston</span>
                                mentioned you in a comment:
                                <span class="font-medium text-primary-600 ">@bonnie.green</span>
                                what do you say?
                            </div>
                            <div class="text-xs font-medium text-primary-600 ">
                                1 hour ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex py-3 px-4 hover:bg-gray-100 ">
                        <div class="flex-shrink-0">
                            <img class="w-11 h-11 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/robert-brown.png"
                                alt="Robert image" />
                            <div
                                class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-purple-500 rounded-full border border-white ">
                                <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="text-gray-500 font-normal text-sm mb-1.5 ">
                                <span class="font-semibold text-gray-900 ">Robert Brown</span>
                                posted a new video: Glassmorphism - learn how to implement
                                the new design trend.
                            </div>
                            <div class="text-xs font-medium text-primary-600 ">
                                3 hours ago
                            </div>
                        </div>
                    </a>
                </div>
                <a href="#"
                    class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100">
                    <div class="inline-flex items-center">
                        <svg aria-hidden="true" class="mr-2 w-4 h-4 text-gray-500 " fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        View all
                    </div>
                </a>
            </div>
            <!-- Apps -->
            <button type="button" data-dropdown-toggle="apps-dropdown"
                class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 ">
                <span class="sr-only">View notifications</span>
                <!-- Icon -->
                <i class="fa-solid fa-grid-2 fa-lg"></i>
            </button>
            <!-- Dropdown menu -->
            <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white divide-y divide-gray-100 shadow-lg rounded-xl"
                id="apps-dropdown">
                <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 ">
                    Apps
                </div>
                <div class="grid grid-cols-3 gap-4 p-4">
                    <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100  group">
                        <i class="fa-solid fa-calendar-days fa-lg text-gray-400 group-hover:text-gray-500"></i>
                        <div class="text-sm text-gray-900 ">Calendar</div>
                    </a>
                    <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100  group">
                        <i class="fa-solid fa-note fa-lg text-gray-400 group-hover:text-gray-500"></i>
                        <div class="text-sm text-gray-900 ">Notes</div>
                    </a>
                </div>
            </div>
            <button type="button"
                class="flex justify-center items-center mx-3 text-sm rounded-full md:mr-0 focus:ring-0"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ Common::getAvatar() }}"
                    onerror="this.onerror=null;this.src='{{ Common::errorAvatar() }}';" alt="User Avatar" />
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-gray-100 shadow rounded-xl"
                id="dropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm font-semibold text-gray-900 ">{{ Auth::user()->username }}</span>
                    <span class="block text-sm text-gray-900 truncate ">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                    <li>
                        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">My
                            profile</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">Account
                            settings</a>
                    </li>
                </ul>
                <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100  "><svg
                                class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            My likes</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100  "><svg
                                class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                </path>
                            </svg>
                            Collections</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100  ">
                            <span class="flex items-center">
                                <svg aria-hidden="true" class="mr-2 w-5 h-5 text-primary-600 " fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Pro version
                            </span>
                        </a>
                    </li>
                </ul>
                <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                    <li>
                        <a href="{{ route('signout') }}" class="block py-2 px-4 text-sm hover:bg-gray-100">Sign
                            out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
