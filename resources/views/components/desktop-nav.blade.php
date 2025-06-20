<div class="hidden md:fixed md:inset-y-0 md:flex md:w-56 md:flex-col">
    <div class="flex min-h-0 flex-1 flex-col bg-[#1f1f1f] shadow-[1px_0_1rem_rgba(0,0,0,1)] left-0 transition duration-500">
        <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
            <div class="flex flex-shrink-0 items-center px-6">
                <a href="/" class="flex items-center py-1 font-bold rounded-md text-white">
                    <span class="text-3xl">SANDA</span>
                    <span class="text-3xl text-[#77C1D2]">DEV</span>
                </a>
            </div>
            <nav class="mt-5 flex-1 space-y-.5">
                <a href="/" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] uppercase flex items-center px-6 py-1 font-bold rounded-m">
                    <x-svg.house class="w-8 h-8" />
                    <span class="ml-2">Home</span>
                </a>
                <a href="/games" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] uppercase flex items-center px-6 py-1 font-bold rounded-m">
                    <x-svg.puzzle class="w-8 h-8" />
                    <span class="ml-2">Games</span>
                </a>

                @if (str_contains(request()->url(), 'games'))
                    <a href="/games/blackjack" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Blackjack
                    </a>
                    <!-- <a href="/games/candyland" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Candyland
                    </a> -->
                    <a href="/games/horse-racing" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Horse Racing
                    </a>
                    <!-- <a href="/games/pokemon-quiz" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Pokemon Quiz (API)
                    </a> -->
                    <a href="/games/quiz" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Quiz
                    </a>
                    <!-- <a href="/games/quiz-with-database" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Quiz (SQL Database)
                    </a> -->
                    <a href="/games/snake" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Snake
                    </a>
                    <a href="/games/trex" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        T-Rex Runner
                    </a>
                    <a href="/games/war" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        War
                    </a>
                    <a href="/games/wheel-of-fortune" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Wheel of Fortune
                    </a>
                    <a href="/games/wordle" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Wordle
                    </a>
                @endif

                <a href="/projects" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-6 py-1 font-bold rounded-md">
                    <x-svg.trophy class="w-8 h-8" />
                    <span class="ml-2 uppercase">Projects</span>
                </a>

                @if (str_contains(request()->url(), 'projects'))
                    <!-- <a href="/projects/accordian" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Accordian
                    </a> -->
                    <a href="/projects/calculator" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Calculator
                    </a>
                    <a href="/projects/expense-tracker" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Expense Tracker
                    </a>
                    <a href="/projects/memory" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Memory
                    </a>
                    <!-- <a href="/projects/modal" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Modal
                    </a> -->
                    <a href="/projects/pokemon-list" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Pokedex
                    </a>
                    <!-- <a href="/projects/sort" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Sort/Filter
                    </a> -->
                    <a href="/projects/todo-list" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Todo List
                    </a>
                    <a href="/projects/weather" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-6 py-1 rounded-md">
                        Weather
                    </a>
                @endif

                <!-- <a href="/components" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-6 py-1 font-bold rounded-md">
                    <x-svg.user class="w-8 h-8" />
                    <span class="ml-2 uppercase">Components</span>
                </a> -->

                <a href="/test" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center mt-8 px-6 py-1 font-bold rounded-md">
                    <x-svg.beaker class="w-8 h-8" />
                    <span class="ml-2 uppercase">Testing</span>
                </a>
            </nav>
        </div>

        <div class="flex justify-between text-sm px-2 py-1 font-bold text-gray-300">
            <div class="flex items-center">
                <x-svg.cog class="w-4 h-4" />
                <span class="ml-1 uppercase">Settings</span>
            </div>
            <div>
                v.1.0
            </div>
        </div>

    </div>
</div>
