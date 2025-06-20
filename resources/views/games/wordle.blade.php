<x-layout>
    <div x-data="wordleGame" class="max-w-xl mx-auto my-12">
        <div class="bg-[#1b1b1c] rounded-2xl shadow-2xl p-8 border border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <div class="text-[#77C1D2]">
                    <span class="font-bold">Attempt: </span>
                    <span x-text="currentRow + 1" class="text-xl"></span>
                    <span>/6</span>
                </div>
                <div class="text-[#77C1D2]">
                    <span class="font-bold">Streak: </span>
                    <span x-text="gamesWon" class="text-xl"></span>
                </div>
            </div>

            <!-- Game Grid -->
            <div class="flex justify-center mb-6">
                <div class="grid grid-cols-5 gap-2">
                    <template x-for="(row, rowIndex) in board.slice().reverse()" :key="rowIndex">
                        <template x-for="(cell, colIndex) in row" :key="colIndex">
                            <div class="w-12 h-12 border-2 border-gray-600 flex items-center justify-center text-white font-bold text-xl uppercase transition-all duration-200"
                                 :class="{
                                     'border-[#77C1D2]': (5 - rowIndex - 1) === currentRow && colIndex === currentCol,
                                     'bg-green-600 border-green-600': cell.status === 'correct',
                                     'bg-yellow-600 border-yellow-600': cell.status === 'present',
                                     'bg-gray-700 border-gray-700': cell.status === 'absent',
                                     'border-gray-400': (5 - rowIndex - 1) === currentRow && colIndex < currentCol
                                 }">
                                <span x-text="cell.letter" x-show="cell.letter" x-cloak></span>
                            </div>
                        </template>
                    </template>
                </div>
            </div>

            <!-- Virtual Keyboard -->
            <div class="mb-4">
                <div class="flex flex-wrap justify-center gap-2 mb-4">
                    <template x-for="letter in letters" :key="letter">
                        <button x-on:click="handleKeyPress(letter)"
                                class="uppercase rounded-full px-4 py-2 text-lg font-bold shadow transition-all duration-100 focus:outline-none cursor-pointer bg-[#23232a] text-[#77C1D2] hover:bg-[#23232a]/80"
                                x-text="letter">
                        </button>
                    </template>
                </div>
                <div class="flex justify-center gap-2">
                    <button x-on:click="handleKeyPress('Enter')"
                            class="px-6 py-2 bg-[#77C1D2] hover:bg-[#77C1D2]/80 text-white font-bold rounded-full transition-all duration-150">
                        Enter
                    </button>
                    <button x-on:click="handleKeyPress('Backspace')"
                            class="px-6 py-2 bg-gray-600 hover:bg-gray-500 text-white font-bold rounded-full transition-all duration-150">
                        ←
                    </button>
                </div>
            </div>

            <!-- Game Over Messages -->
            <div x-show="gameWon" x-cloak class="text-center mb-4">
                <p class="text-2xl font-bold text-green-400 mb-2">Congratulations!</p>
                <p class="text-[#77C1D2] mb-4">You guessed it in <span class="font-bold" x-text="currentRow + 1"></span> tries!</p>
                <button x-on:click="restartGame()" class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 border border-[#77C1D2]">
                    Play Again
                </button>
            </div>

            <div x-show="gameLost" x-cloak class="text-center mb-4">
                <p class="text-2xl font-bold text-red-400 mb-2">Game Over!</p>
                <p class="text-[#77C1D2] mb-4">The word was: <span class="font-bold" x-text="targetWord"></span></p>
                <button x-on:click="restartGame()" class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 border border-[#77C1D2]">
                    Try Again
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('wordleGame', () => ({
                // Game state
                gameWon: false,
                gameLost: false,
                currentRow: 0,
                currentCol: 0,
                gamesWon: 0,

                // Game data
                board: [],
                targetWord: '',
                letters: "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split(""),
                keyStatuses: {},

                // Word list (5-letter words)
                wordList: [
                    'ABOUT', 'ABOVE', 'ABUSE', 'ACTOR', 'ACUTE', 'ADMIT', 'ADOPT', 'ADULT', 'AFTER', 'AGAIN',
                    'AGENT', 'AGREE', 'AHEAD', 'ALARM', 'ALBUM', 'ALERT', 'ALIKE', 'ALIVE', 'ALLOW', 'ALONE',
                    'ALONG', 'ALTER', 'AMONG', 'ANGER', 'ANGLE', 'ANGRY', 'APART', 'APPLE', 'APPLY', 'ARENA',
                    'ARGUE', 'ARISE', 'ARRAY', 'ASIDE', 'ASSET', 'AUDIO', 'AUDIT', 'AVOID', 'AWARD', 'AWARE',
                    'BADLY', 'BAKER', 'BASES', 'BASIC', 'BASIS', 'BEACH', 'BEGAN', 'BEGIN', 'BEING', 'BELOW',
                    'BENCH', 'BILLY', 'BIRTH', 'BLACK', 'BLAME', 'BLIND', 'BLOCK', 'BLOOD', 'BOARD', 'BOOST',
                    'BOOTH', 'BOUND', 'BRAIN', 'BRAND', 'BREAD', 'BREAK', 'BREED', 'BRIEF', 'BRING', 'BROAD',
                    'BROKE', 'BROWN', 'BUILD', 'BUILT', 'BUYER', 'CABLE', 'CALIF', 'CARRY', 'CATCH', 'CAUSE',
                    'CHAIN', 'CHAIR', 'CHART', 'CHASE', 'CHEAP', 'CHECK', 'CHEST', 'CHIEF', 'CHILD', 'CHINA',
                    'CHOSE', 'CIVIL', 'CLAIM', 'CLASS', 'CLEAN', 'CLEAR', 'CLICK', 'CLIMB', 'CLOCK', 'CLOSE',
                    'COACH', 'COAST', 'COULD', 'COUNT', 'COURT', 'COVER', 'CRAFT', 'CRASH', 'CREAM', 'CRIME',
                    'CROSS', 'CROWD', 'CROWN', 'CURVE', 'CYCLE', 'DAILY', 'DANCE', 'DATED', 'DEALT', 'DEATH',
                    'DEBUT', 'DELAY', 'DEPTH', 'DOING', 'DOUBT', 'DOZEN', 'DRAFT', 'DRAMA', 'DRAWN', 'DREAM',
                    'DRESS', 'DRINK', 'DRIVE', 'DROVE', 'DYING', 'EAGER', 'EARLY', 'EARTH', 'EIGHT', 'ELITE',
                    'EMPTY', 'ENEMY', 'ENJOY', 'ENTER', 'ENTRY', 'EQUAL', 'ERROR', 'EVENT', 'EVERY', 'EXACT',
                    'EXIST', 'EXTRA', 'FAITH', 'FALSE', 'FAULT', 'FIBER', 'FIELD', 'FIFTH', 'FIFTY', 'FIGHT',
                    'FINAL', 'FIRST', 'FIXED', 'FLASH', 'FLEET', 'FLOOR', 'FLUID', 'FOCUS', 'FORCE', 'FORTH',
                    'FORTY', 'FORUM', 'FOUND', 'FRAME', 'FRANK', 'FRAUD', 'FRESH', 'FRONT', 'FRUIT', 'FULLY',
                    'FUNNY', 'GIANT', 'GIVEN', 'GLASS', 'GLOBE', 'GOING', 'GRACE', 'GRADE', 'GRAND', 'GRANT',
                    'GRASS', 'GRAVE', 'GREAT', 'GREEN', 'GROSS', 'GROUP', 'GROWN', 'GUARD', 'GUESS', 'GUEST',
                    'GUIDE', 'HAPPY', 'HARRY', 'HEART', 'HEAVY', 'HENCE', 'HENRY', 'HORSE', 'HOTEL', 'HOUSE',
                    'HUMAN', 'IDEAL', 'IMAGE', 'INDEX', 'INNER', 'INPUT', 'ISSUE', 'JAPAN', 'JIMMY', 'JOINT',
                    'JONES', 'JUDGE', 'KNOWN', 'LABEL', 'LARGE', 'LASER', 'LATER', 'LAUGH', 'LAYER', 'LEARN',
                    'LEASE', 'LEAST', 'LEAVE', 'LEGAL', 'LEVEL', 'LEWIS', 'LIGHT', 'LIMIT', 'LINKS', 'LIVES',
                    'LOCAL', 'LOOSE', 'LOWER', 'LUCKY', 'LUNCH', 'LYING', 'MAGIC', 'MAJOR', 'MAKER', 'MARCH',
                    'MARIA', 'MATCH', 'MAYBE', 'MAYOR', 'MEANT', 'MEDIA', 'METAL', 'MIGHT', 'MINOR', 'MINUS',
                    'MIXED', 'MODEL', 'MONEY', 'MONTH', 'MORAL', 'MOTOR', 'MOUNT', 'MOUSE', 'MOUTH', 'MOVED',
                    'MOVIE', 'MUSIC', 'NEEDS', 'NEVER', 'NEWLY', 'NIGHT', 'NOISE', 'NORTH', 'NOTED', 'NOVEL',
                    'NURSE', 'OCCUR', 'OCEAN', 'OFFER', 'OFFIC', 'ORDER', 'OTHER', 'OUGHT', 'PAINT', 'PANEL',
                    'PAPER', 'PARTY', 'PEACE', 'PETER', 'PHASE', 'PHONE', 'PHOTO', 'PIECE', 'PILOT', 'PITCH',
                    'PLACE', 'PLAIN', 'PLANE', 'PLANT', 'PLATE', 'POINT', 'POUND', 'POWER', 'PRESS', 'PRICE',
                    'PRIDE', 'PRIME', 'PRINT', 'PRIOR', 'PRIZE', 'PROOF', 'PROUD', 'PROVE', 'QUEEN', 'QUICK',
                    'QUIET', 'QUITE', 'RADIO', 'RAISE', 'RANGE', 'RAPID', 'RATIO', 'REACH', 'READY', 'REALM',
                    'REBEL', 'REFER', 'RELAX', 'REPLY', 'RIGHT', 'RIVAL', 'RIVER', 'ROBIN', 'ROGER', 'ROMAN',
                    'ROUGH', 'ROUND', 'ROUTE', 'ROYAL', 'RURAL', 'SAID', 'SAINT', 'SALAD', 'SALES', 'SALON',
                    'SAUCE', 'SAVED', 'SCALE', 'SCENE', 'SCOPE', 'SCORE', 'SENSE', 'SERVE', 'SEVEN', 'SHALL',
                    'SHAPE', 'SHARE', 'SHARP', 'SHEET', 'SHELF', 'SHELL', 'SHIFT', 'SHIRT', 'SHOCK', 'SHOOT',
                    'SHORT', 'SHOWN', 'SIGHT', 'SINCE', 'SIXTH', 'SIXTY', 'SIZED', 'SKILL', 'SLEEP', 'SLIDE',
                    'SMALL', 'SMART', 'SMILE', 'SMITH', 'SMOKE', 'SOLID', 'SOLVE', 'SORRY', 'SOUND', 'SOUTH',
                    'SPACE', 'SPARE', 'SPEAK', 'SPEED', 'SPEND', 'SPENT', 'SPLIT', 'SPOKE', 'SPORT', 'STAFF',
                    'STAGE', 'STAKE', 'STAND', 'START', 'STATE', 'STEAM', 'STEEL', 'STEER', 'STICK', 'STILL',
                    'STOCK', 'STONE', 'STOOD', 'STORE', 'STORM', 'STORY', 'STRIP', 'STUCK', 'STUDY', 'STUFF',
                    'STYLE', 'SUGAR', 'SUITE', 'SUPER', 'SWEET', 'TABLE', 'TAKEN', 'TASTE', 'TAXES', 'TEACH',
                    'TEETH', 'TERRY', 'TEXAS', 'THANK', 'THEFT', 'THEIR', 'THEME', 'THERE', 'THESE', 'THICK',
                    'THING', 'THINK', 'THIRD', 'THOSE', 'THREE', 'THREW', 'THROW', 'THUMB', 'TIGER', 'TIGHT',
                    'TIMER', 'TIRED', 'TITLE', 'TODAY', 'TOPIC', 'TOTAL', 'TOUCH', 'TOUGH', 'TOWER', 'TRACK',
                    'TRADE', 'TRAIN', 'TREAT', 'TREND', 'TRIAL', 'TRIBE', 'TRICK', 'TRIED', 'TRIES', 'TRUCK',
                    'TRULY', 'TRUNK', 'TRUST', 'TRUTH', 'TWICE', 'UNDER', 'UNDUE', 'UNION', 'UNITY', 'UNTIL',
                    'UPPER', 'UPSET', 'URBAN', 'USAGE', 'USUAL', 'VALID', 'VALUE', 'VIDEO', 'VIRUS', 'VISIT',
                    'VITAL', 'VOCAL', 'VOICE', 'WASTE', 'WATCH', 'WATER', 'WHEEL', 'WHERE', 'WHICH', 'WHILE',
                    'WHITE', 'WHOLE', 'WHOSE', 'WOMAN', 'WOMEN', 'WORLD', 'WORRY', 'WORSE', 'WORST', 'WORTH',
                    'WOULD', 'WOUND', 'WRITE', 'WRONG', 'WROTE', 'YIELD', 'YOUNG', 'YOUTH'
                ],

                init() {
                    this.loadStats();
                    this.setupKeyListeners();
                    this.startGame();
                },

                startGame() {
                    this.gameWon = false;
                    this.gameLost = false;
                    this.currentRow = 0;
                    this.currentCol = 0;
                    this.keyStatuses = {};

                    // Initialize board
                    this.board = Array(6).fill().map(() =>
                        Array(5).fill().map(() => ({ letter: '', status: '' }))
                    );

                    // Select random word
                    this.targetWord = this.wordList[Math.floor(Math.random() * this.wordList.length)];
                    console.log('Target word:', this.targetWord); // For debugging
                },

                handleKeyPress(key) {
                    if (this.gameWon || this.gameLost) return;

                    if (key === 'Enter') {
                        this.submitGuess();
                    } else if (key === 'Backspace') {
                        this.deleteLetter();
                    } else if (key.length === 1 && key.match(/[A-Za-z]/)) {
                        this.addLetter(key.toUpperCase());
                    }
                },

                addLetter(letter) {
                    if (this.currentCol < 5) {
                        this.board[this.currentRow][this.currentCol] = { letter: letter, status: '' };
                        this.currentCol++;
                    }
                },

                deleteLetter() {
                    if (this.currentCol > 0) {
                        this.currentCol--;
                        this.board[this.currentRow][this.currentCol] = { letter: '', status: '' };
                    }
                },

                submitGuess() {
                    if (this.currentCol !== 5) return;

                    const guess = this.board[this.currentRow].map(cell => cell.letter).join('');

                    // Check each letter
                    const targetArray = this.targetWord.split('');
                    const guessArray = guess.split('');
                    const statuses = new Array(5).fill('');

                    // First pass: mark correct letters
                    for (let i = 0; i < 5; i++) {
                        if (guessArray[i] === targetArray[i]) {
                            statuses[i] = 'correct';
                            targetArray[i] = null; // Mark as used
                        }
                    }

                    // Second pass: mark present letters
                    for (let i = 0; i < 5; i++) {
                        if (statuses[i] === '') {
                            const letterIndex = targetArray.indexOf(guessArray[i]);
                            if (letterIndex !== -1) {
                                statuses[i] = 'present';
                                targetArray[letterIndex] = null; // Mark as used
                            } else {
                                statuses[i] = 'absent';
                            }
                        }
                    }

                    // Update board
                    for (let i = 0; i < 5; i++) {
                        this.board[this.currentRow][i].status = statuses[i];

                        // Update keyboard status
                        const letter = guessArray[i];
                        if (statuses[i] === 'correct') {
                            this.keyStatuses[letter] = 'correct';
                        } else if (statuses[i] === 'present' && this.keyStatuses[letter] !== 'correct') {
                            this.keyStatuses[letter] = 'present';
                        } else if (statuses[i] === 'absent' && this.keyStatuses[letter] !== 'correct' && this.keyStatuses[letter] !== 'present') {
                            this.keyStatuses[letter] = 'absent';
                        }
                    }

                    // Check win condition
                    if (guess === this.targetWord) {
                        this.gameWon = true;
                        this.gamesWon++;
                        this.saveStats();
                    } else if (this.currentRow === 5) {
                        this.gameLost = true;
                    } else {
                        this.currentRow++;
                        this.currentCol = 0;
                    }
                },

                restartGame() {
                    this.startGame();
                },

                setupKeyListeners() {
                    document.addEventListener('keydown', (e) => {
                        if (!this.gameWon || this.gameLost) return;

                        if (e.key === 'Enter') {
                            e.preventDefault();
                            this.handleKeyPress('Enter');
                        } else if (e.key === 'Backspace') {
                            e.preventDefault();
                            this.handleKeyPress('Backspace');
                        } else if (e.key.match(/^[a-zA-Z]$/)) {
                            e.preventDefault();
                            this.handleKeyPress(e.key.toUpperCase());
                        }
                    });
                },

                loadStats() {
                    this.gamesWon = parseInt(localStorage.getItem('wordleStreak') || '0');
                },

                saveStats() {
                    localStorage.setItem('wordleStreak', this.gamesWon.toString());
                }
            }))
        })
    </script>
</x-layout>
