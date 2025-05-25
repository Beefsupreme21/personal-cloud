<x-layout>
    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <li class="rounded-2xl px-8 py-10 flex flex-col md:flex-row items-center gap-8">
                <img class="size-48 rounded-full md:size-56" src="/images/profile.jpg" alt="">
                <div class="flex flex-col justify-center md:justify-start items-center md:items-start text-left w-full">
                    <h1 class="text-4xl font-bold text-white mb-2">Hey, I'm Cory 👋</h1>
                    <p class="text-lg text-[#77C1D2] mb-4">Welcome to my site! I'm a Laravel developer who enjoys building things with the TALL stack, Tailwind, Alpine, Laravel, and Livewire. This is my personal playground and portfolio where I store and share some of the projects and games I've built for fun, learning, and experimentation. Feel free to try them out below!</p>
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

            <div class="mx-auto max-w-2xl lg:mx-0 mt-10">
                <h2 class="text-pretty text-4xl font-semibold tracking-tight text-white sm:text-5xl">My Projects</h2>
                <p class="mt-6 text-lg/8 text-gray-300">A collection of games and demos I've built</p>
            </div>
            <ul role="list" class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-14 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4">
                <li>
                    <a href="/games/blackjack" class="block">
                        <div class="aspect-[14/13] mb-2 w-full rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-800 flex items-center justify-center">
                            <span class="text-white text-4xl font-black tracking-wide">BLACKJACK</span>
                        </div>
                        <p class="text-base/7 text-gray-300">Classic casino card game</p>
                        <p class="text-sm/6 text-gray-500">Built with Alpine.js & Tailwind</p>
                    </a>
                </li>
                <li>
                    <a href="/games/horse-racing" class="block">
                        <div class="aspect-[14/13] mb-2 w-full rounded-2xl bg-gradient-to-br from-blue-400 to-blue-900 flex items-center justify-center">
                            <span class="text-white text-4xl font-black tracking-wide text-center">HORSE RACING</span>
                        </div>
                        <p class="text-base/7 text-gray-300">Bet on virtual horse races</p>
                        <p class="text-sm/6 text-gray-500">Built with Alpine.js & Tailwind</p>
                    </a>
                </li>
                <li>
                    <a href="/games/quiz" class="block">
                        <div class="aspect-[14/13] mb-2 w-full rounded-2xl bg-gradient-to-br from-yellow-200 to-yellow-400 flex items-center justify-center">
                            <span class="text-black text-4xl font-black tracking-wide">QUIZ</span>
                        </div>
                        <p class="text-base/7 text-gray-300">Test your knowledge</p>
                        <p class="text-sm/6 text-gray-500">Built with Alpine.js & Tailwind</p>
                    </a>
                </li>
                <li>
                    <a href="/games/wheel-of-fortune" class="block">
                        <div class="aspect-[14/13] mb-2 w-full rounded-2xl bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                            <span class="text-white text-3xl font-black tracking-wide text-center">WHEEL OF FORTUNE</span>
                        </div>
                        <p class="text-base/7 text-gray-300">Guess the phrase</p>
                        <p class="text-sm/6 text-gray-500">Built with Alpine.js & Tailwind</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-layout>
