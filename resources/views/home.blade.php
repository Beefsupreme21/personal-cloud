<x-layout>
    <div class="py-24 sm:py-32 relative overflow-hidden">
        <!-- Background Design Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Circles -->
            <div class="absolute bottom-40 right-10 w-60 h-60 border border-[#77C1D2] opacity-10 rounded-full"></div>
            <!-- Large background circle -->
            <div class="absolute -top-32 -right-32 w-96 h-96 border border-[#77C1D2] opacity-10 rounded-full"></div>
            <div class="absolute -bottom-32 -left-32 w-80 h-80 border border-[#77C1D2] opacity-10 rounded-full"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
            <!-- Hero Section -->
            <li class="rounded-2xl flex flex-col md:flex-row items-center gap-8">
                <img class="size-48 rounded-full md:size-56" src="/images/profile.jpg" alt="">
                <div class="flex flex-col justify-center md:justify-start items-center md:items-start text-left w-full">
                    <h1 class="text-4xl font-bold text-white mb-2">Hey, I'm Cory 👋</h1>
                    <p class="text-lg text-[#77C1D2] mb-4">Welcome to my site! I'm a Laravel developer who enjoys building things with the TALL stack, Tailwind, Alpine, Laravel, and Livewire. I use this site to share projects I've built for fun and learning. Feel free to try them out below!</p>
                    <ul role="list" class="flex gap-x-6">
                        <li>
                            <a href="https://github.com/Beefsupreme21" class="text-gray-400 hover:text-gray-300" target="_blank" rel="noopener">
                                <span class="sr-only">GitHub</span>
                                <svg class="size-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 2C6.477 2 2 6.484 2 12.021c0 4.428 2.865 8.184 6.839 9.504.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.342-3.369-1.342-.454-1.157-1.11-1.465-1.11-1.465-.908-.62.069-.608.069-.608 1.004.07 1.532 1.032 1.532 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.025A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.295 2.748-1.025 2.748-1.025.546 1.378.202 2.397.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.847-2.339 4.695-4.566 4.943.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.744 0 .268.18.579.688.481C19.138 20.203 22 16.447 22 12.021 22 6.484 17.523 2 12 2z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/cory-sanda-74769924a/" class="text-gray-400 hover:text-gray-300" target="_blank" rel="noopener">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="size-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Featured Projects -->
            <div class="mx-auto max-w-2xl lg:mx-0 mt-16">
                <h2 class="text-pretty text-4xl font-semibold tracking-tight text-white sm:text-5xl">Featured Projects</h2>
                <p class="mt-6 text-lg/8 text-gray-300">My best work - fully modernized applications</p>
            </div>

            <ul role="list" class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4">
                <li>
                    <a href="/games/blackjack" class="block group">
                        <div class="aspect-[14/13] mb-4 w-full rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-800 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white text-3xl md:text-2xl lg:text-2xl xl:text-3xl font-black tracking-wide">BLACKJACK</span>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Blackjack</h3>
                        <p class="text-base/7 text-gray-300">Classic casino card game with betting, dealer AI, and realistic gameplay</p>
                        <p class="text-sm/6 text-[#77C1D2] mt-2">🎮 Game</p>
                    </a>
                </li>
                <li>
                    <a href="/projects/pokemon-list" class="block group">
                        <div class="aspect-[14/13] mb-4 w-full rounded-2xl bg-gradient-to-br from-red-400 to-red-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white text-3xl md:text-2xl lg:text-2xl xl:text-3xl font-black tracking-wide">POKÉDEX</span>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Pokédex</h3>
                        <p class="text-base/7 text-gray-300">Interactive Pokémon database with search, filters, and detailed stats</p>
                        <p class="text-sm/6 text-[#77C1D2] mt-2">🛠️ Project</p>
                    </a>
                </li>
                <li>
                    <a href="/projects/memory" class="block group">
                        <div class="aspect-[14/13] mb-4 w-full rounded-2xl bg-gradient-to-br from-purple-400 to-purple-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white text-3xl md:text-2xl lg:text-2xl xl:text-3xl font-black tracking-wide">MEMORY</span>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Memory Game</h3>
                        <p class="text-base/7 text-gray-300">Brain training game with multiple difficulty levels and scoring</p>
                        <p class="text-sm/6 text-[#77C1D2] mt-2">🛠️ Project</p>
                    </a>
                </li>
                <li>
                    <button onclick="document.getElementById('more-projects').scrollIntoView({behavior: 'smooth'})" class="block group w-full text-left">
                        <div class="aspect-[14/13] mb-4 w-full rounded-2xl bg-gradient-to-br from-gray-600 to-gray-800 border-2 border-dashed border-gray-500 flex flex-col items-center justify-center group-hover:scale-105 transition-transform duration-300 group-hover:border-[#77C1D2]">
                            <div class="text-4xl mb-2">➕</div>
                            <span class="text-white text-xl font-bold tracking-wide">MORE</span>
                            <span class="text-white text-xl font-bold tracking-wide">PROJECTS</span>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">View All Projects</h3>
                        <p class="text-base/7 text-gray-300">Explore more games, tools, and demos</p>
                        <p class="text-sm/6 text-[#77C1D2] mt-2">👇 Scroll Down</p>
                    </button>
                </li>
            </ul>

            <!-- More Projects Section -->
            <div id="more-projects" class="mt-24">
                <div class="mx-auto max-w-2xl lg:mx-0 mb-16">
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-white sm:text-5xl">All Projects</h2>
                    <p class="mt-6 text-lg/8 text-gray-300">Games, tools, and demos organized by category</p>
                </div>

                <!-- Games Section -->
                <div class="mb-16">
                    <h3 class="text-2xl font-semibold text-white mb-8 flex items-center">
                        <span class="text-3xl mr-3">🎮</span>
                        Games
                    </h3>
                    <ul role="list" class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <li>
                            <a href="/games/blackjack" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-800 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-2xl font-black tracking-wide">BLACKJACK</span>
                                </div>
                                <p class="text-base font-medium text-white">Blackjack</p>
                                <p class="text-sm text-gray-400">Classic casino card game</p>
                            </a>
                        </li>
                        <li>
                            <a href="/games/hangman" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-orange-400 to-orange-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-2xl font-black tracking-wide">HANGMAN</span>
                                </div>
                                <p class="text-base font-medium text-white">Hangman</p>
                                <p class="text-sm text-gray-400">Guess the word game</p>
                            </a>
                        </li>
                        <li>
                            <a href="/games/horse-racing" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-blue-400 to-blue-900 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-xl font-black tracking-wide text-center">HORSE RACING</span>
                                </div>
                                <p class="text-base font-medium text-white">Horse Racing</p>
                                <p class="text-sm text-gray-400">Bet on virtual horse races</p>
                            </a>
                        </li>
                        <li>
                            <a href="/games/quiz" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-yellow-200 to-yellow-400 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-black text-2xl font-black tracking-wide">QUIZ</span>
                                </div>
                                <p class="text-base font-medium text-white">Quiz</p>
                                <p class="text-sm text-gray-400">Test your knowledge</p>
                            </a>
                        </li>
                        <li>
                            <a href="/games/war" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-red-500 to-red-800 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-2xl font-black tracking-wide">WAR</span>
                                </div>
                                <p class="text-base font-medium text-white">War</p>
                                <p class="text-sm text-gray-400">Classic card battle game</p>
                            </a>
                        </li>
                        <li>
                            <a href="/games/wheel-of-fortune" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-lg font-black tracking-wide text-center">WHEEL OF FORTUNE</span>
                                </div>
                                <p class="text-base font-medium text-white">Wheel of Fortune</p>
                                <p class="text-sm text-gray-400">Guess the phrase</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Projects Section -->
                <div>
                    <h3 class="text-2xl font-semibold text-white mb-8 flex items-center">
                        <span class="text-3xl mr-3">🛠️</span>
                        Tools & Projects
                    </h3>
                    <ul role="list" class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <li>
                            <a href="/projects/calculator" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-slate-400 to-slate-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-2xl font-black tracking-wide">CALC</span>
                                </div>
                                <p class="text-base font-medium text-white">Calculator</p>
                                <p class="text-sm text-gray-400">Modern calculator app</p>
                            </a>
                        </li>
                        <li>
                            <a href="/projects/expense-tracker" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-green-400 to-green-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-xl font-black tracking-wide text-center">EXPENSE TRACKER</span>
                                </div>
                                <p class="text-base font-medium text-white">Expense Tracker</p>
                                <p class="text-sm text-gray-400">Track income and expenses</p>
                            </a>
                        </li>
                        <li>
                            <a href="/projects/memory" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-purple-400 to-purple-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-2xl font-black tracking-wide">MEMORY</span>
                                </div>
                                <p class="text-base font-medium text-white">Memory Game</p>
                                <p class="text-sm text-gray-400">Brain training game</p>
                            </a>
                        </li>
                        <li>
                            <a href="/projects/pokemon-list" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-red-400 to-red-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-xl font-black tracking-wide">POKÉDEX</span>
                                </div>
                                <p class="text-base font-medium text-white">Pokédex</p>
                                <p class="text-sm text-gray-400">Interactive Pokémon database</p>
                            </a>
                        </li>
                        <li>
                            <a href="/projects/todo-list" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-blue-400 to-blue-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-2xl font-black tracking-wide">TODO</span>
                                </div>
                                <p class="text-base font-medium text-white">Todo List</p>
                                <p class="text-sm text-gray-400">Task management app</p>
                            </a>
                        </li>
                        <li>
                            <a href="/projects/weather" class="block group">
                                <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-cyan-400 to-cyan-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                    <span class="text-white text-2xl font-black tracking-wide">WEATHER</span>
                                </div>
                                <p class="text-base font-medium text-white">Weather Dashboard</p>
                                <p class="text-sm text-gray-400">Real-time weather data</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>
