<x-layout>
    <div class="max-w-7xl mx-auto my-12 px-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-[#77C1D2] mb-4">Games</h1>
            <p class="text-gray-300 text-lg">Choose a game to play!</p>
        </div>

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
                <a href="/games/candyland" class="block group">
                    <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-pink-400 to-purple-600 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                        <span class="text-white text-2xl font-black tracking-wide">CANDYLAND</span>
                    </div>
                    <p class="text-base font-medium text-white">Candyland</p>
                    <p class="text-sm text-gray-400">Colorful board game adventure</p>
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
                <a href="/games/pokemon-quiz" class="block group">
                    <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-yellow-400 to-red-500 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                        <span class="text-white text-xl font-black tracking-wide text-center">POKEMON QUIZ</span>
                    </div>
                    <p class="text-base font-medium text-white">Pokemon Quiz</p>
                    <p class="text-sm text-gray-400">Test your Pokemon knowledge</p>
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
                <a href="/games/snake" class="block group">
                    <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                        <span class="text-white text-2xl font-black tracking-wide">SNAKE</span>
                    </div>
                    <p class="text-base font-medium text-white">Snake</p>
                    <p class="text-sm text-gray-400">Classic snake game</p>
                </a>
            </li>
            <li>
                <a href="/games/trex" class="block group">
                    <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                        <span class="text-white text-xl font-black tracking-wide text-center">T-REX RUNNER</span>
                    </div>
                    <p class="text-base font-medium text-white">T-Rex Runner</p>
                    <p class="text-sm text-gray-400">Jump over obstacles</p>
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
            <li>
                <a href="/games/wordle" class="block group">
                    <div class="aspect-[14/13] mb-3 w-full rounded-xl bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                        <span class="text-white text-2xl font-black tracking-wide">WORDLE</span>
                    </div>
                    <p class="text-base font-medium text-white">Wordle</p>
                    <p class="text-sm text-gray-400">Guess the 5-letter word</p>
                </a>
            </li>
        </ul>
    </div>
</x-layout>
