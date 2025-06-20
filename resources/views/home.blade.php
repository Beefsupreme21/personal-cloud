<x-layout>
    <div class="py-24 sm:py-32 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">

            <!-- Grid pattern overlay -->
            <!-- <div class="absolute inset-0 bg-[linear-gradient(rgba(119,193,210,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(119,193,210,0.03)_1px,transparent_1px)] bg-[size:50px_50px]"></div> -->

            <!-- Radial fade from center -->
            <div class="absolute inset-0 bg-radial-gradient from-transparent via-transparent to-gray-900/10"></div>

            <!-- Subtle grid variation -->
            <div class="absolute inset-0 bg-[linear-gradient(rgba(119,193,210,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(119,193,210,0.02)_1px,transparent_1px)] bg-[size:100px_100px] opacity-40"></div>

            <!-- Floating geometric elements -->
            <div class="absolute top-20 right-20 w-8 h-8 border border-[#77C1D2]/20 rounded-lg animate-pulse rotate-12"></div>

            <!-- Subtle gradient orbs -->
            <div class="absolute top-1/3 right-1/3 w-32 h-32 bg-gradient-to-br from-[#77C1D2]/8 to-transparent rounded-full blur-xl"></div>
            <div class="absolute bottom-1/4 left-1/4 w-24 h-24 bg-gradient-to-tr from-[#77C1D2]/6 to-transparent rounded-full blur-xl"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
            <li class="rounded-2xl flex flex-col md:flex-row items-center gap-8">
                <img class="size-48 rounded-full md:size-48" src="/images/profile.png" alt="">
                <div class="flex flex-col justify-center md:justify-start items-center md:items-start text-left w-full">
                    <h1 class="text-4xl font-bold text-white mb-2 playfair-display">Hey, I'm Cory 👋</h1>
                    <p class="text-lg text-[#77C1D2] mb-4 handlee-regular">Welcome to my site! I'm a Laravel developer who enjoys building things with the TALL stack, Tailwind, Alpine, Laravel, and Livewire. I use this site to share projects I've built for fun and learning. Feel free to try them out below!</p>
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

            <div class="mt-24">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-white sm:text-5xl playfair-display">Skills/Tools</h2>
                </div>
                <div class="flex gap-12 mt-10">
                    <div class="text-center">
                        <x-svg.laravel class="w-16 h-16 mx-auto mb-2" />
                        <p class="text-[#77C1D2] font-medium">Laravel</p>
                    </div>
                    <div class="text-center">
                        <x-svg.vue class="w-16 h-16 mx-auto mb-2" />
                        <p class="text-[#77C1D2] font-medium">Vue.js</p>
                    </div>
                    <div class="text-center">
                        <x-svg.alpine class="w-16 h-16 mx-auto mb-2" />
                        <p class="text-[#77C1D2] font-medium">Alpine.js</p>
                    </div>
                    <div class="text-center">
                        <x-svg.livewire class="w-16 h-16 mx-auto mb-2" />
                        <p class="text-[#77C1D2] font-medium">Livewire</p>
                    </div>
                    <div class="text-center">
                        <x-svg.css class="w-16 h-16 mx-auto mb-2" />
                        <p class="text-[#77C1D2] font-medium">CSS</p>
                    </div>
                    <div class="text-center">
                        <x-svg.tailwind class="w-16 h-16 mx-auto mb-2" />
                        <p class="text-[#77C1D2] font-medium">Tailwind</p>
                    </div>
                    <div class="text-center">
                        <x-svg.sql class="text-gray-200 w-16 h-16 mx-auto mb-2" />
                        <p class="text-[#77C1D2] font-medium">SQL</p>
                    </div>
                    <div class="text-center">
                        <x-svg.github class="w-16 text-gray-200 h-16 mx-auto mb-2" />
                        <p class="text-[#77C1D2] font-medium">GitHub</p>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-2xl lg:mx-0 mt-24">
                <h2 class="text-pretty text-4xl font-semibold tracking-tight text-white sm:text-5xl playfair-display">Featured Projects</h2>
            </div>

            <ul role="list" class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4">
                <li>
                    <a href="/games/wordle" class="block group">
                        <div class="aspect-[14/13] mb-4 w-full rounded-2xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white text-3xl md:text-2xl lg:text-2xl xl:text-3xl font-black tracking-wide">WORDLE</span>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Wordle</h3>
                        <p class="text-base/7 text-gray-300">Classic Wordle with streak tracking</p>
                        <p class="text-sm/6 text-[#77C1D2] mt-2">🎮 Game</p>
                    </a>
                </li>
                <li>
                    <a href="/games/snake" class="block group">
                        <div class="aspect-[14/13] mb-4 w-full rounded-2xl bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white text-3xl md:text-2xl lg:text-2xl xl:text-3xl font-black tracking-wide">SNAKE</span>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Snake</h3>
                        <p class="text-base/7 text-gray-300">High score tracking</p>
                        <p class="text-sm/6 text-[#77C1D2] mt-2">🎮 Game</p>
                    </a>
                </li>
                <li>
                    <a href="/projects/memory" class="block group">
                        <div class="aspect-[14/13] mb-4 w-full rounded-2xl bg-gradient-to-br from-purple-400 to-purple-700 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white text-3xl md:text-2xl lg:text-2xl xl:text-3xl font-black tracking-wide">MEMORY</span>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Memory Game</h3>
                        <p class="text-base/7 text-gray-300">Multiple difficulty levels and scoring</p>
                        <p class="text-sm/6 text-[#77C1D2] mt-2">🛠️ Project</p>
                    </a>
                </li>
                <li>
                    <a href="/games/trex" class="block group">
                        <div class="aspect-[14/13] mb-4 w-full rounded-2xl bg-gradient-to-br from-red-500 to-red-800 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <span class="text-white text-3xl md:text-2xl lg:text-2xl xl:text-3xl font-black tracking-wide text-center">T-REX<br>RUNNER</span>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">T-Rex Runner</h3>
                        <p class="text-base/7 text-gray-300">Work in progress</p>
                        <p class="text-sm/6 text-[#77C1D2] mt-2">🎮 Game</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-layout>
