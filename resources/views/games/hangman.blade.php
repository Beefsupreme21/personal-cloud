<x-layout>
    <div x-data="hangmanGame" class="max-w-xl mx-auto my-12">
        <div class="bg-[#1b1b1c] rounded-2xl shadow-2xl p-8 border border-gray-700">
            <div class="mb-6 text-center">
                <span class="block text-lg font-bold text-[#77C1D2] mb-2">Word:</span>
                <span x-text="displayWord.split('').join(' ')" class="text-4xl font-mono tracking-widest text-[#77C1D2] bg-[#23232a] rounded-lg px-4 py-2"></span>
            </div>
            <div class="flex justify-between mb-4">
                <div>
                    <span class="font-bold text-[#77C1D2]">Max Attempts:</span>
                    <span x-text="maxAttempts" class="text-[#77C1D2]"></span>
                </div>
                <div>
                    <span class="font-bold text-[#77C1D2]">Remaining:</span>
                    <span x-text="remainingAttempts" class="text-[#77C1D2]"></span>
                </div>
            </div>
            <div class="mb-4">
                <span class="font-bold text-[#77C1D2]">Guessed:</span>
                <span x-text="Array.from(guessedLetters).join(', ')" class="text-[#77C1D2]"></span>
            </div>
            <div x-show="showResults" class="mb-6 text-center">
                <p x-text="resultsMessage" class="text-2xl font-bold" :class="resultsMessage === 'You Win' ? 'text-[#77C1D2]' : 'text-red-400'"></p>
            </div>
            <div class="flex flex-wrap justify-center gap-2 mb-2">
                <template x-for="letter in letters">
                    <button x-text="letter"
                            x-on:click="guessLetter(letter)"
                            class="uppercase rounded-full px-4 py-2 text-lg font-bold shadow transition-all duration-100 focus:outline-none cursor-pointer"
                            x-bind:disabled="showResults"
                            x-bind:class="{
                                'bg-[#23232a] text-[#77C1D2] hover:bg-[#23232a]/80 border border-[#77C1D2]': !guessedLetters.has(letter) && !displayWord.includes(letter),
                                'bg-[#77C1D2] text-[#1b1b1c] border border-[#77C1D2]': guessedLetters.has(letter) && displayWord.includes(letter),
                                'bg-gray-300 text-gray-500 cursor-not-allowed border border-gray-400': guessedLetters.has(letter) && !displayWord.includes(letter),
                                'bg-red-500 text-white border border-red-500': incorrectGuesses.includes(letter)
                            }">
                    </button>
                </template>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('hangmanGame', () => ({
                word: 'hangman',
                letters: "abcdefghijklmnopqrstuvwxyz".split(""),
                maxAttempts: 6,
                guessedLetters: new Set(),
                displayWord: null,
                showResults: false,
                resultsMessage: null,

                get remainingAttempts() {
                    return this.maxAttempts - this.incorrectGuesses.length;
                },

                get incorrectGuesses() {
                    return Array.from(this.guessedLetters).filter(letter => !this.word.includes(letter));
                },

                guessLetter(letter) {
                    if (this.guessedLetters.has(letter) || this.showResults) {
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
                        if (this.remainingAttempts <= 1) {
                            this.showResults = true;
                            this.resultsMessage = 'You Lose';
                        }
                    }
                },

                init() {
                    this.displayWord = '_'.repeat(this.word.length);
                },

            }))
        })
    </script>
</x-layout>
