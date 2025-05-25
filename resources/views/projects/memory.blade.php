<x-layout>
    <div class="min-h-screen bg-[#1f1f1f] text-white" x-data="memory">
        <div class="max-w-6xl mx-auto px-6 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">🧠 Memory Game</h1>
                <p class="text-gray-400">Test your memory by matching pairs of cards</p>
            </div>

            <!-- Game Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-black/30 border border-gray-600 rounded-xl p-4 text-center">
                    <div class="text-2xl font-bold text-blue-400" x-text="moves"></div>
                    <div class="text-sm text-gray-400">Moves</div>
                </div>
                <div class="bg-black/30 border border-gray-600 rounded-xl p-4 text-center">
                    <div class="text-2xl font-bold text-green-400" x-text="matches"></div>
                    <div class="text-sm text-gray-400">Matches</div>
                </div>
                <div class="bg-black/30 border border-gray-600 rounded-xl p-4 text-center">
                    <div class="text-2xl font-bold text-purple-400" x-text="formatTime(timer)"></div>
                    <div class="text-sm text-gray-400">Time</div>
                </div>
                <div class="bg-black/30 border border-gray-600 rounded-xl p-4 text-center">
                    <div class="text-2xl font-bold text-yellow-400" x-text="score"></div>
                    <div class="text-sm text-gray-400">Score</div>
                </div>
            </div>

            <!-- Difficulty Selection -->
            <div x-show="!gameStarted" class="text-center mb-8">
                <h2 class="text-2xl font-semibold mb-6">Choose Difficulty</h2>
                <div class="flex flex-wrap justify-center gap-4">
                    <button @click="startGame('easy')"
                            class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition-colors">
                        🟢 Easy (4x2)
                    </button>
                    <button @click="startGame('medium')"
                            class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg transition-colors">
                        🟡 Medium (4x4)
                    </button>
                    <button @click="startGame('hard')"
                            class="px-6 py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition-colors">
                        🔴 Hard (6x4)
                    </button>
                </div>
            </div>

            <!-- Game Board -->
            <div x-show="gameStarted" class="mb-8">
                <div class="flex justify-center mb-6">
                    <button @click="gameStarted = false; gameWon = false; clearInterval(timerInterval);"
                            class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors">
                        🔄 New Game
                    </button>
                </div>

                <div class="flex justify-center">
                    <div class="grid gap-3"
                         :class="{
                             'grid-cols-4 max-w-sm': difficulty === 'easy',
                             'grid-cols-4 max-w-md': difficulty === 'medium',
                             'grid-cols-6 max-w-lg': difficulty === 'hard'
                         }">
                        <template x-for="(card, index) in cards" :key="index">
                            <div class="relative">
                                <button
                                    x-show="!card.cleared"
                                    @click="flipCard(card, index)"
                                    :disabled="flippedCards.length >= 2 || card.flipped"
                                    class="w-16 h-16 md:w-20 md:h-20 rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    :class="{
                                        'bg-gray-600 hover:bg-gray-500': !card.flipped,
                                        'cursor-not-allowed opacity-50': flippedCards.length >= 2 && !card.flipped
                                    }"
                                    :style="card.flipped ? `background: ${card.color}; box-shadow: 0 0 20px ${card.color}40;` : ''">

                                    <!-- Card Back -->
                                    <div x-show="!card.flipped" class="flex items-center justify-center h-full text-2xl">
                                    </div>

                                    <!-- Card Front -->
                                    <div x-show="card.flipped" class="flex items-center justify-center h-full text-2xl" x-text="card.emoji">
                                    </div>
                                </button>

                                <!-- Cleared Card Placeholder -->
                                <div x-show="card.cleared"
                                     class="w-16 h-16 md:w-20 md:h-20 rounded-lg bg-green-500/20 border-2 border-green-500 flex items-center justify-center text-2xl"
                                     x-text="card.emoji">
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Game Over Modal -->
            <div x-show="gameWon"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                <div class="bg-[#1f1f1f] border border-gray-600 rounded-xl p-8 max-w-md mx-4 text-center">
                    <div class="text-6xl mb-4">🎉</div>
                    <h2 class="text-3xl font-bold text-green-400 mb-4">Congratulations!</h2>
                    <p class="text-gray-300 mb-6">You completed the memory game!</p>

                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                        <div class="bg-black/30 p-3 rounded-lg">
                            <div class="text-blue-400 font-bold" x-text="moves"></div>
                            <div class="text-gray-400">Moves</div>
                        </div>
                        <div class="bg-black/30 p-3 rounded-lg">
                            <div class="text-purple-400 font-bold" x-text="formatTime(timer)"></div>
                            <div class="text-gray-400">Time</div>
                        </div>
                        <div class="bg-black/30 p-3 rounded-lg">
                            <div class="text-yellow-400 font-bold" x-text="score"></div>
                            <div class="text-gray-400">Score</div>
                        </div>
                        <div class="bg-black/30 p-3 rounded-lg">
                            <div class="text-green-400 font-bold" x-text="difficulty.toUpperCase()"></div>
                            <div class="text-gray-400">Level</div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <button @click="gameStarted = false; gameWon = false; clearInterval(timerInterval);"
                                class="flex-1 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors">
                            Play Again
                        </button>
                        <button @click="gameWon = false; gameStarted = false"
                                class="flex-1 px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors">
                            Change Level
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('memory', () => ({
                cards: [],
                flippedCards: [],
                moves: 0,
                matches: 0,
                timer: 0,
                gameStarted: false,
                gameWon: false,
                difficulty: '',
                timerInterval: null,

                cardSets: {
                    easy: [
                        { color: '#ef4444', emoji: '🍎' },
                        { color: '#3b82f6', emoji: '🍇' },
                        { color: '#10b981', emoji: '🍊' },
                        { color: '#f59e0b', emoji: '🍌' }
                    ],
                    medium: [
                        { color: '#ef4444', emoji: '🍎' },
                        { color: '#3b82f6', emoji: '🍇' },
                        { color: '#10b981', emoji: '🍊' },
                        { color: '#f59e0b', emoji: '🍌' },
                        { color: '#8b5cf6', emoji: '🍓' },
                        { color: '#ec4899', emoji: '🍑' },
                        { color: '#06b6d4', emoji: '🥝' },
                        { color: '#84cc16', emoji: '🥭' }
                    ],
                    hard: [
                        { color: '#ef4444', emoji: '🍎' },
                        { color: '#3b82f6', emoji: '🍇' },
                        { color: '#10b981', emoji: '🍊' },
                        { color: '#f59e0b', emoji: '🍌' },
                        { color: '#8b5cf6', emoji: '🍓' },
                        { color: '#ec4899', emoji: '🍑' },
                        { color: '#06b6d4', emoji: '🥝' },
                        { color: '#84cc16', emoji: '🥭' },
                        { color: '#f97316', emoji: '🍒' },
                        { color: '#6366f1', emoji: '🫐' },
                        { color: '#14b8a6', emoji: '🍍' },
                        { color: '#d946ef', emoji: '🥥' }
                    ]
                },

                get score() {
                    if (this.moves === 0) return 0;
                    const baseScore = this.matches * 100;
                    const timeBonus = Math.max(0, 300 - this.timer);
                    const movesPenalty = Math.max(0, this.moves - this.matches * 2) * 5;
                    const difficultyMultiplier = this.difficulty === 'easy' ? 1 : this.difficulty === 'medium' ? 1.5 : 2;
                    return Math.round((baseScore + timeBonus - movesPenalty) * difficultyMultiplier);
                },

                startGame(level) {
                    this.difficulty = level;
                    this.resetGame();
                    this.gameStarted = true;
                    this.startTimer();
                },

                resetGame() {
                    this.moves = 0;
                    this.matches = 0;
                    this.timer = 0;
                    this.gameWon = false;
                    this.flippedCards = [];

                    if (this.timerInterval) {
                        clearInterval(this.timerInterval);
                    }

                    // Create pairs of cards
                    const cardSet = this.cardSets[this.difficulty];
                    this.cards = [...cardSet, ...cardSet].map(card => ({
                        ...card,
                        flipped: false,
                        cleared: false,
                        id: Math.random()
                    })).sort(() => Math.random() - 0.5);

                    if (this.gameStarted) {
                        this.startTimer();
                    }
                },

                startTimer() {
                    this.timerInterval = setInterval(() => {
                        this.timer++;
                    }, 1000);
                },

                async flipCard(card, index) {
                    if (card.flipped || card.cleared || this.flippedCards.length >= 2) return;

                    card.flipped = true;
                    this.flippedCards.push({ card, index });

                    if (this.flippedCards.length === 2) {
                        this.moves++;

                        if (this.hasMatch()) {
                            // Match found
                            setTimeout(() => {
                                this.flippedCards.forEach(({ card }) => {
                                    card.cleared = true;
                                });
                                this.matches++;
                                this.flippedCards = [];

                                // Check if game is won
                                if (this.cards.every(card => card.cleared)) {
                                    this.gameWon = true;
                                    clearInterval(this.timerInterval);
                                }
                            }, 1000);
                        } else {
                            // No match
                            setTimeout(() => {
                                this.flippedCards.forEach(({ card }) => {
                                    card.flipped = false;
                                });
                                this.flippedCards = [];
                            }, 1000);
                        }
                    }
                },

                hasMatch() {
                    return this.flippedCards[0].card.emoji === this.flippedCards[1].card.emoji;
                },

                formatTime(seconds) {
                    const mins = Math.floor(seconds / 60);
                    const secs = seconds % 60;
                    return `${mins}:${secs.toString().padStart(2, '0')}`;
                }
            }))
        })
    </script>
</x-layout>