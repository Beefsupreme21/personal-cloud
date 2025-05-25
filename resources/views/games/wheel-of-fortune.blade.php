<x-layout>
    <div x-data="wheelOfFortune" class="max-w-xl mx-auto my-12">
        <div class="bg-[#1b1b1c] rounded-2xl shadow-2xl p-8 border border-gray-700">
            <div x-show="!gameStarted" class="flex flex-col items-center">
                <div class="w-full h-64 mb-4 flex justify-center items-center">
                    <img src="{{ asset('images/wheel-of-fortune.png') }}" alt="" class="w-auto h-full object-contain">
                </div>
                <button x-on:click="startGame()" class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 border border-[#77C1D2] w-80 mb-4">
                  Start Game
                </button>
                <div class="flex w-full gap-2">
                  <button x-on:click="currentCategory = null" class="flex-1 text-center py-2 px-4 rounded-lg border-2 border-[#77C1D2] bg-[#23232a] text-[#77C1D2] hover:bg-[#23232a]/80 focus:outline-none" x-bind:class="currentCategory === null ? 'ring-2 ring-[#77C1D2] bg-[#1b1b1c]' : ''">
                    Any
                  </button>
                  <button x-on:click="currentCategory = 'classic movie'" class="flex-1 text-center py-2 px-4 rounded-lg border-2 border-[#77C1D2] bg-[#23232a] text-[#77C1D2] hover:bg-[#23232a]/80 focus:outline-none" x-bind:class="currentCategory === 'classic movie' ? 'ring-2 ring-[#77C1D2] bg-[#1b1b1c]' : ''">
                    Classic Movie
                  </button>
                  <button x-on:click="currentCategory = 'landmark'" class="flex-1 text-center py-2 px-4 rounded-lg border-2 border-[#77C1D2] bg-[#23232a] text-[#77C1D2] hover:bg-[#23232a]/80 focus:outline-none" x-bind:class="currentCategory === 'landmark' ? 'ring-2 ring-[#77C1D2] bg-[#1b1b1c]' : ''">
                    Landmark
                  </button>
                </div>
            </div>
            <div x-show="gameStarted" x-cloak>
                <h1 x-text="currentCategory" class="text-center capitalize text-[#77C1D2] mb-4"></h1>
                <div class="flex flex-wrap justify-center mb-8">
                    <template x-for="(letter, index) in displayWord" :key="index">
                        <div>
                            <template x-if="letter == ' '">
                                <div class="bg-[#1b1b1c] w-8 h-8 mx-1 my-1 text-center capitalize flex items-center"></div>
                            </template>
                            <template x-if="letter !== ' '">
                                <div class="border border-[#77C1D2] bg-[#23232a] w-8 h-8 mx-1 my-1 text-center capitalize flex items-center justify-center font-bold text-3xl text-[#77C1D2]" x-text="letter"></div>
                            </template>
                        </div>
                    </template>
                </div>
                <div class="mb-4 text-[#77C1D2]">
                    <span class="font-bold">Remaining Attempts:</span>
                    <span x-text="remainingAttempts"></span>
                </div>
                <div class="mb-4 text-[#77C1D2]">
                    <span class="font-bold">Guessed Letters:</span>
                    <span x-text="Array.from(guessedLetters).join(', ')"></span>
                </div>
                <div class="flex flex-wrap justify-center gap-2 mb-4">
                    <template x-for="letter in letters">
                        <button x-text="letter"
                                x-on:click="guessLetter(letter)"
                                class="uppercase rounded-full px-4 py-2 text-lg font-bold shadow transition-all duration-100 focus:outline-none cursor-pointer"
                                x-bind:class="{
                                    'bg-[#23232a] text-[#77C1D2] hover:bg-[#23232a]/80': !guessedLetters.has(letter) && !displayWord.includes(letter),
                                    'bg-[#77C1D2] text-[#1b1b1c]': guessedLetters.has(letter) && displayWord.includes(letter),
                                    'bg-gray-300 text-gray-500 cursor-not-allowed': guessedLetters.has(letter) && !displayWord.includes(letter),
                                    'bg-red-500 text-white': incorrectGuesses.includes(letter)
                                }">
                        </button>
                    </template>
                </div>
                <div x-show="showResults" class="mb-4 text-center">
                    <p class="font-bold text-2xl" :class="resultsMessage === 'You Win' ? 'text-[#77C1D2]' : 'text-red-400'" x-text="resultsMessage"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('wheelOfFortune', () => ({
                phrases: [
                    { phrase: 'caddyshack', category: 'classic movie' },
                    { phrase: 'ghostbusters', category: 'classic movie' },
                    { phrase: 'sydney opera house', category: 'landmark'},
                ],
                letters: "abcdefghijklmnopqrstuvwxyz".split(""),
                maxAttempts: 6,
                guessedLetters: new Set(),
                displayWord: null,
                showResults: false,
                resultsMessage: null,
                gameStarted: false,
                currentCategory: null,

                startGame() {
                    let categoryPhrases = this.phrases;

                    if (this.currentCategory && this.currentCategory !== 'Any') {
                        categoryPhrases = this.phrases.filter(p => p.category === this.currentCategory);
                    }

                    const phraseObject = categoryPhrases[Math.floor(Math.random() * categoryPhrases.length)];
                    this.word = phraseObject.phrase;
                    this.currentCategory = phraseObject.category;
                    this.displayWord = this.word.replace(/[a-z]/gi, '_');
                    this.guessedLetters.clear();
                    this.showResults = false;
                    this.gameStarted = true;
                },


                get remainingAttempts() {
                    return this.maxAttempts - this.incorrectGuesses.length;
                },

                get incorrectGuesses() {
                    return Array.from(this.guessedLetters).filter(letter => !this.word.includes(letter));
                },

                guessLetter(letter) {
                    if (this.guessedLetters.has(letter)) {
                        return;
                    }

                    this.guessedLetters.add(letter);

                    if (this.word.includes(letter)) {
                        for (let i = 0; i < this.word.length; i++) {
                            if (this.word[i] === letter) {
                                this.displayWord = this.displayWord.slice(0, i) + letter + this.displayWord.slice(i + 1);
                            }
                        }
                        if (this.displayWord === this.word) {
                            this.showResults = true;
                            this.resultsMessage = 'You Win';
                        }
                    } else {
                        if (this.remainingAttempts === 0) {
                            this.showResults = true;
                            this.resultsMessage = 'You Lose';
                        }
                    }
                },
            }))
        })
    </script>
</x-layout>
