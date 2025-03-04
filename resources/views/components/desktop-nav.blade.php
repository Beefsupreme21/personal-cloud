<div class="hidden md:fixed md:inset-y-0 md:flex md:w-80 md:flex-col">
    <div class="flex min-h-0 flex-1 flex-col bg-[#12141C]">
        <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
            <div class="flex flex-shrink-0 items-center px-6">
                <a href="/" class="flex items-center py-1 font-bold rounded-md text-white hover:text-[#77C1D2]">
                    <img src="{{ asset('images/alpinejs.svg') }}" class="h-16" alt="">
                    <span class="text-3xl ml-2 ">Alpine.js</span>
                </a>
            </div>
            <nav class="mt-5 flex-1 space-y-.5 px-6">
                <a href="/directives/x-data" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-2 py-1 font-bold rounded-m">
                    Directives
                </a>
                @if (str_contains(request()->url(), 'directives'))
                    <a href="/directives/x-data" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-data
                    </a>
                    <a href="/directives/x-bind" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-bind
                    </a>
                    <a href="/directives/x-on" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-on
                    </a>
                    <a href="/directives/x-text" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-text
                    </a>
                    <a href="/directives/x-html" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-html
                    </a>
                    <a href="/directives/x-model" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-model
                    </a>
                    <a href="/directives/x-show" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-show
                    </a>
                    <a href="/directives/x-transition" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-transition
                    </a>
                    <a href="/directives/x-for" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-for
                    </a>
                    <a href="/directives/x-if" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-if
                    </a>
                    <a href="/directives/x-init#" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-init
                    </a>
                    <a href="/directives/x-effect" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-effect
                    </a>
                    <a href="/directives/x-ref" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-ref
                    </a>
                    <a href="/directives/x-cloak" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-cloak
                    </a>
                    <a href="/directives/x-ignore" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        x-ignore
                    </a>
                @endif

                <a href="/users" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-2 py-1 font-bold rounded-md">
                    Users
                </a>

                @if (str_contains(request()->url(), 'users'))
                    <a href="/users/create" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Create New User
                    </a>
                @endif

                <a href="/books" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-2 py-1 font-bold rounded-md">
                    Books
                </a>

                @if (str_contains(request()->url(), 'books'))
                    <a href="/books/create" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Create New Book
                    </a>
                @endif

                <a href="/games" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-2 py-1 font-bold rounded-md">
                    Games
                </a>

                @if (str_contains(request()->url(), 'games'))
                    <a href="/games/blackjack" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Blackjack
                    </a>
                    <a href="/games/candyland" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Candyland
                    </a>
                    <a href="/games/hangman" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Hangman
                    </a>
                    <a href="/games/horse-racing" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Horse Racing
                    </a>
                    <a href="/games/pokemon-quiz" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Pokemon Quiz (API)
                    </a>
                    <a href="/games/quiz" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Quiz
                    </a>
                    <a href="/games/quiz-with-database" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Quiz (SQL Database)
                    </a>
                    <a href="/games/war" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        War
                    </a>
                    <a href="/games/wheel-of-fortune" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Wheel of Fortune
                    </a>
                @endif

                <a href="/projects" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-2 py-1 font-bold rounded-md">
                    Projects
                </a>

                @if (str_contains(request()->url(), 'projects'))
                    <a href="/projects/accordian" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Accordian
                    </a>
                    <a href="/projects/calculator" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Calculator
                    </a>
                    <a href="/projects/expense-tracker" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Expense Tracker
                    </a>
                    <a href="/projects/memory" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Memory
                    </a>
                    <a href="/projects/modal" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Modal
                    </a>
                    <a href="/projects/pokemon-list" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Pokemon List
                    </a>
                    <a href="/projects/sort" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Sort/Filter
                    </a>
                    <a href="/projects/todo-list" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Todo List
                    </a>
                    <a href="/projects/weather" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Weather
                    </a>
                @endif

                <a href="/components" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-2 py-1 font-bold rounded-md">
                    Components
                </a>

                
                @if (str_contains(request()->url(), 'component-examples'))
                    <a href="/component-examples/flash" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Flash
                    </a>
                    <a href="/projects/calculator" class="text-gray-500 hover:bg-gray-700 hover:text-[#77C1D2] flex items-center ml-2 px-2 py-1 rounded-md">
                        Calculator
                    </a>
                @endif


                <a href="/test" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center mt-8 px-2 py-1 font-bold rounded-md">
                    Testing
                </a>
            </nav>
        </div>
    </div>
</div>
