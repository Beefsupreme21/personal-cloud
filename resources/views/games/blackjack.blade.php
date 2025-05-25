<x-fullscreen-layout>
    <div x-data="blackjack" x-init="startGame()" class="min-h-screen bg-gradient-to-b from-emerald-900 to-emerald-950 font-sans">
        <!-- Header -->
        <div class="fixed top-0 left-0 right-0 bg-black/50 backdrop-blur-sm z-50">
            <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
                <a href="/" class="flex items-center gap-2 text-white hover:text-emerald-400 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                        <path d="M15.41 16.09l-4.58-4.59 4.58-4.59L12 5 5 12l7 7 3.41-3.41z"/>
                    </svg>
                    <span>Back to Home</span>
                </a>
                <div class="text-2xl font-bold text-emerald-400">
                    Balance: $<span x-text="playerBalance"></span>
                </div>
            </div>
        </div>

        <!-- Main Game Area -->
        <div class="pt-20 pb-32 px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Dealer Section -->
                <div class="bg-black/30 rounded-2xl p-6 mb-8 backdrop-blur-sm">
                    <h2 class="text-2xl font-bold text-white mb-4">Dealer</h2>
                    <div class="flex justify-center gap-4 mb-2">
                        <template x-for="(card, index) in dealerCards">
                            <div class="transform hover:scale-105 transition-transform">
                                <img x-bind:src="showCardValues[index] ? getCardImage(card) : '/images/cards/back-blue.png'"
                                    class="w-24 h-36 object-contain rounded-lg shadow-xl"
                                    alt="Card">
                            </div>
                        </template>
                    </div>
                    <div class="text-center text-xl font-bold text-emerald-400" x-text="dealerHandValue"></div>
                </div>

                <!-- Game Status -->
                <div class="text-center mb-8">
                    <div x-show="gamePhase === 'betting'"
                        class="text-2xl font-bold text-white animate-pulse">
                        Place Your Bet
                    </div>
                    <div x-show="gamePhase === 'playing'"
                        class="text-2xl font-bold text-white">
                        Hit or Stand
                    </div>
                    <div x-show="gamePhase === 'gameOver'">
                        <p x-text="resultsMessage"
                            class="text-3xl font-bold text-emerald-400 animate-bounce">
                        </p>
                    </div>
                </div>

                <!-- Player Section -->
                <div class="bg-black/30 rounded-2xl p-6 mb-8 backdrop-blur-sm">
                    <h2 class="text-2xl font-bold text-white mb-4">Your Hand</h2>
                    <div class="flex justify-center gap-4 mb-4">
                        <template x-for="card in playerCards">
                            <div class="transform hover:scale-105 transition-transform">
                                <img x-bind:src="getCardImage(card)"
                                    class="w-24 h-36 object-contain rounded-lg shadow-xl"
                                    alt="Card">
                            </div>
                        </template>
                    </div>
                    <div class="text-center text-xl font-bold text-emerald-400" x-text="playerHandValue"></div>
                </div>

                <!-- Current Bet -->
                <div class="text-center mb-8">
                    <div class="text-3xl font-bold text-white">
                        Current Bet: $<span x-text="currentBet"></span>
                    </div>
                    <div class="flex justify-center gap-4 mt-4">
                        <template x-for="chip in getChipsForDisplay()">
                            <div class="flex items-center gap-2 bg-black/30 px-4 py-2 rounded-full">
                                <template x-if="chip.denomination === 1">
                                    <x-svg.chip-1 class="w-8 h-8"/>
                                </template>
                                <template x-if="chip.denomination === 5">
                                    <x-svg.chip-5 class="w-8 h-8"/>
                                </template>
                                <template x-if="chip.denomination === 25">
                                    <x-svg.chip-25 class="w-8 h-8"/>
                                </template>
                                <template x-if="chip.denomination === 100">
                                    <x-svg.chip-100 class="w-8 h-8"/>
                                </template>
                                <span x-text="chip.count" class="text-white font-bold"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center gap-4 mb-8">
                    <template x-if="gamePhase === 'playing'">
                        <div class="flex gap-4">
                            <button x-on:click="playerStand()"
                                class="px-8 py-4 bg-gray-700 hover:bg-gray-600 text-white text-xl font-bold rounded-xl shadow-lg transition-all duration-200 hover:scale-105">
                                Stand
                            </button>
                            <button x-on:click="playerHit()"
                                class="px-8 py-4 bg-red-600 hover:bg-red-500 text-white text-xl font-bold rounded-xl shadow-lg transition-all duration-200 hover:scale-105">
                                Hit
                            </button>
                        </div>
                    </template>
                    <template x-if="gamePhase === 'betting'">
                        <div class="flex gap-4">
                            <button x-bind:disabled="currentBet === 0"
                                x-on:click="currentBet = 0"
                                x-bind:class="{'opacity-50 cursor-not-allowed': currentBet === 0, 'hover:bg-gray-600': currentBet !== 0}"
                                class="px-8 py-4 bg-gray-700 text-white text-xl font-bold rounded-xl shadow-lg transition-all duration-200">
                                Clear
                            </button>
                            <button x-bind:disabled="currentBet === 0"
                                x-on:click="placeBet()"
                                x-bind:class="{'opacity-50 cursor-not-allowed': currentBet === 0, 'hover:bg-red-500': currentBet !== 0}"
                                class="px-8 py-4 bg-red-600 text-white text-xl font-bold rounded-xl shadow-lg transition-all duration-200">
                                Deal
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Betting Chips - Only show during betting phase -->
        <div x-show="gamePhase === 'betting'" class="fixed bottom-0 left-0 right-0 bg-black/50 backdrop-blur-sm py-4">
            <div class="max-w-4xl mx-auto flex justify-center gap-6">
                <button x-on:click="if (currentBet < playerBalance) { currentBet += 1 }"
                    class="transform hover:scale-110 transition-transform">
                    <x-svg.chip-1 class="w-12 h-12"/>
                </button>
                <button x-on:click="if (currentBet < playerBalance) { currentBet += 5 }"
                    class="transform hover:scale-110 transition-transform">
                    <x-svg.chip-5 class="w-12 h-12"/>
                </button>
                <button x-on:click="if (currentBet < playerBalance) { currentBet += 25 }"
                    class="transform hover:scale-110 transition-transform">
                    <x-svg.chip-25 class="w-12 h-12"/>
                </button>
                <button x-on:click="if (currentBet < playerBalance) { currentBet += 100 }"
                    class="transform hover:scale-110 transition-transform">
                    <x-svg.chip-100 class="w-12 h-12"/>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('blackjack', () => ({
                deck: [],
                playerCards: [],
                dealerCards: [],
                playerHandValue: 0,
                dealerHandValue: 0,
                playerBalance: 1000,
                currentBet: 0,
                showCardValues: [false, true, true, true, true],
                resultsMessage: null,
                gamePhase: 'betting',

                startGame() {
                    this.gamePhase = 'betting';
                    this.deck = this.getDeck();
                },

                getDeck() {
                    const values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
                    const suits = ['♠', '♣', '♥', '♦'];
                    const deck = [];
                    const pointValues = {
                        '2': 2,
                        '3': 3,
                        '4': 4,
                        '5': 5,
                        '6': 6,
                        '7': 7,
                        '8': 8,
                        '9': 9,
                        '10': 10,
                        'J': 10,
                        'Q': 10,
                        'K': 10,
                        'A': 11,
                    };
                    for (const suit of suits) {
                        for (const value of values) {
                            const card = {
                                displayName: value,
                                value,
                                suit,
                                points: pointValues[value],
                                isHidden: false,
                            };
                            deck.push(card);
                        }
                    }
                    return this.shuffle(deck);
                },

                shuffle(deck) {
                    for (let i = deck.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [deck[i], deck[j]] = [deck[j], deck[i]];
                    }
                    return deck;
                },

                getCardImage(card) {
                    const suitName = card.suit === '♠' ? 'spade' :
                                    card.suit === '♣' ? 'club' :
                                    card.suit === '♥' ? 'heart' : 'diamond';
                    const valueName = card.displayName === 'A' ? '1' :
                                    card.displayName === 'K' ? 'king' :
                                    card.displayName === 'Q' ? 'queen' :
                                    card.displayName === 'J' ? 'jack' : card.displayName;
                    const imageName = `${suitName}_${valueName}`;
                    return `/images/cards/${imageName}.png`;
                },

                async dealCards() {
                    this.drawCard('player');
                    await this.delay(500);
                    this.drawCard('dealer');
                    await this.delay(500);
                    this.drawCard('player');
                    await this.delay(500);
                    this.drawCard('dealer');
                    this.checkForBlackjack();
                },

                checkForBlackjack() {
                    if (this.dealerHandValue == 21 && this.playerHandValue == 21) {
                        this.playerTies();
                    } else if (this.dealerHandValue != 21 && this.playerHandValue == 21) {
                        this.playerWins();
                    } else if (this.dealerHandValue == 21 && this.playerHandValue != 21) {
                        this.dealerWins();
                    }
                },

                drawCard(player) {
                    const card = this.deck.shift();
                    if (player === 'player') {
                        this.playerCards.push(card);
                        this.calculateHandValue(player);
                    } else if (player === 'dealer') {
                        this.dealerCards.push(card);
                        this.calculateHandValue(player);
                        this.showCardValues.push(false);
                    }
                    if (card.value === 'A' && this[player + 'HandValue'] > 21) {
                        this[player + 'HandValue'] -= 10;
                    }
                },

                playerHit() {
                    const card = this.deck.shift();
                    this.playerCards.push(card);
                    this.calculateHandValue('player');
                    if (this.playerHandValue > 21) {
                        this.dealerWins();
                    } else if (this.playerHandValue == 21) {
                        this.dealerTurn();
                    }
                },

                playerStand() {
                    this.dealerTurn();
                },

                async dealerTurn() {
                    this.revealCardValues();
                    while (this.dealerHandValue < 17) {
                        await this.delay(1000);
                        const card = this.deck.shift();
                        this.dealerCards.push(card);
                        this.calculateHandValue('dealer');
                    }
                    if (this.dealerHandValue > 21) {
                        this.playerWins();
                    } else if (this.dealerHandValue == this.playerHandValue) {
                        this.playerTies();
                    }else if (this.dealerHandValue >= this.playerHandValue) {
                        this.dealerWins();
                    } else {
                        this.playerWins();
                    }
                },

                async playerWins() {
                    this.resultsMessage = "Player wins!";
                    this.playerBalance += this.currentBet * 2;
                    this.currentBet = 0;
                    this.gamePhase = 'gameOver';
                    await this.delay(2500);
                    this.resetGame();
                },

                async playerTies() {
                    this.revealCardValues();
                    this.resultsMessage = "Push";
                    this.playerBalance += this.currentBet;
                    this.currentBet = 0;
                    this.gamePhase = 'gameOver';
                    await this.delay(2500);
                    this.resetGame();
                },

                async dealerWins() {
                    this.revealCardValues();
                    this.resultsMessage = "Dealer wins!";
                    this.currentBet = 0;
                    this.gamePhase = 'gameOver';
                    await this.delay(2500);
                    this.resetGame();
                },

                placeBet() {
                    this.playerBalance -= this.currentBet;
                    this.gamePhase = 'playing';
                    this.dealCards();
                },

                revealCardValues() {
                    this.showCardValues[0] = true;
                },

                resetGame() {
                    this.playerCards = [];
                    this.dealerCards = [];
                    this.playerHandValue = 0;
                    this.dealerHandValue = 0;
                    this.resultsMessage = null;
                    this.deck = this.getDeck();
                    // this.dealCards();
                    this.showCardValues[0] = false;
                    this.gamePhase = 'betting';
                },

                sumCardValues(cards) {
                    let handValue = 0;
                    let numAces = 0;
                    for (const card of cards) {
                        handValue += card.points;
                        if (card.value === 'A') {
                            numAces++;
                        }
                    }
                    while (handValue > 21 && numAces > 0) {
                        handValue -= 10;
                        numAces--;
                    }
                    return handValue;
                },

                getChipsForDisplay() {
                    let bet = this.currentBet;
                    const chipDenominations = [100, 25, 5, 1];

                    const chipsForDisplay = [];

                    chipDenominations.forEach(denomination => {
                        const chipCount = Math.floor(bet / denomination);
                        if (chipCount > 0) {
                            chipsForDisplay.push({
                                denomination: denomination,
                                count: chipCount,
                            });
                            bet -= chipCount * denomination;
                        }
                    });

                    return chipsForDisplay;
                },

                calculateHandValue(player) {
                    if (player === 'player') {
                        this.playerHandValue = this.sumCardValues(this.playerCards);
                    } else if (player === 'dealer') {
                        this.dealerHandValue = this.sumCardValues(this.dealerCards);
                    }
                },

                delay(ms) {
                    return new Promise((resolve) => setTimeout(resolve, ms));
                },
            }))
        })
    </script>

</x-fullscreen-layout>
