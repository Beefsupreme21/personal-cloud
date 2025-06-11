<x-layout>
    <div x-data="snakeGame" class="max-w-xl mx-auto my-12">
        <div class="bg-[#1b1b1c] rounded-2xl shadow-2xl p-8 border border-gray-700">
            <div x-show="!gameStarted" class="text-center">
                <h1 class="text-3xl font-bold text-[#77C1D2] mb-6">Snake Game</h1>
                <button x-on:click="startGame()" class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 border border-[#77C1D2]">
                    Start Game
                </button>
                <div class="mt-4 text-[#77C1D2]">
                    <p class="mb-2">Use arrow keys or WASD to move</p>
                    <p class="text-sm">Eat the food to grow and increase your score!</p>
                </div>
            </div>

            <div x-show="gameStarted" x-cloak>
                <div class="flex justify-between items-center mb-4">
                    <div class="text-[#77C1D2]">
                        <span class="font-bold">Score: </span>
                        <span x-text="score" class="text-xl"></span>
                    </div>
                    <div class="text-[#77C1D2]">
                        <span class="font-bold">High Score: </span>
                        <span x-text="highScore" class="text-xl"></span>
                    </div>
                </div>

                <div class="flex justify-center mb-4">
                    <div class="border-2 border-[#77C1D2] rounded-lg p-4 bg-[#23232a]">
                        <div class="grid grid-cols-20 gap-0">
                            <template x-for="(row, rowIndex) in grid" :key="rowIndex">
                                <template x-for="(cell, colIndex) in row" :key="colIndex">
                                    <div class="w-5 h-5"
                                         :class="{
                                             'bg-[#77C1D2]': cell === 'snake',
                                             'bg-red-500': cell === 'food',
                                             'bg-[#1b1b1c]': cell === 'empty'
                                         }">
                                    </div>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>

                <div x-show="gameOver" class="text-center mb-4">
                    <p class="text-2xl font-bold text-red-400 mb-2">Game Over!</p>
                    <p class="text-[#77C1D2] mb-4">Final Score: <span class="font-bold" x-text="score"></span></p>
                    <button x-on:click="restartGame()" class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 border border-[#77C1D2]">
                        Play Again
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('snakeGame', () => ({
                gridSize: 20,
                grid: [],
                snake: [],
                food: {},
                direction: 'right',
                nextDirection: 'right',
                gameStarted: false,
                gameOver: false,
                score: 0,
                highScore: 0,
                gameInterval: null,

                init() {
                    this.initGrid();
                    this.loadHighScore();
                    this.setupKeyListeners();
                },

                initGrid() {
                    this.grid = Array(this.gridSize).fill().map(() => Array(this.gridSize).fill('empty'));
                },

                startGame() {
                    this.gameStarted = true;
                    this.gameOver = false;
                    this.score = 0;
                    this.direction = 'right';
                    this.nextDirection = 'right';

                    this.snake = [
                        { x: 10, y: 10 },
                        { x: 9, y: 10 },
                        { x: 8, y: 10 }
                    ];

                    this.spawnFood();
                    this.updateGrid();
                    this.gameInterval = setInterval(() => this.gameLoop(), 150);
                },

                gameLoop() {
                    if (this.gameOver) return;

                    this.direction = this.nextDirection;
                    this.moveSnake();
                    this.checkCollisions();
                    this.updateGrid();
                },

                moveSnake() {
                    const head = { ...this.snake[0] };

                    switch (this.direction) {
                        case 'down': head.y--; break;
                        case 'up': head.y++; break;
                        case 'left': head.x--; break;
                        case 'right': head.x++; break;
                    }

                    this.snake.unshift(head);

                    if (head.x === this.food.x && head.y === this.food.y) {
                        this.score += 10;
                        this.spawnFood();
                    } else {
                        this.snake.pop();
                    }
                },

                checkCollisions() {
                    const head = this.snake[0];

                    if (head.x < 0 || head.x >= this.gridSize || head.y < 0 || head.y >= this.gridSize) {
                        this.endGame();
                        return;
                    }

                    for (let i = 1; i < this.snake.length; i++) {
                        if (head.x === this.snake[i].x && head.y === this.snake[i].y) {
                            this.endGame();
                            return;
                        }
                    }
                },

                spawnFood() {
                    let foodPosition;
                    do {
                        foodPosition = {
                            x: Math.floor(Math.random() * this.gridSize),
                            y: Math.floor(Math.random() * this.gridSize)
                        };
                    } while (this.snake.some(segment => segment.x === foodPosition.x && segment.y === foodPosition.y));

                    this.food = foodPosition;
                },

                updateGrid() {
                    this.initGrid();

                    this.snake.forEach(segment => {
                        if (segment.x >= 0 && segment.x < this.gridSize && segment.y >= 0 && segment.y < this.gridSize) {
                            this.grid[segment.y][segment.x] = 'snake';
                        }
                    });

                    this.grid[this.food.y][this.food.x] = 'food';
                },

                endGame() {
                    this.gameOver = true;
                    clearInterval(this.gameInterval);

                    if (this.score > this.highScore) {
                        this.highScore = this.score;
                        this.saveHighScore();
                    }
                },

                restartGame() {
                    this.startGame();
                },

                setupKeyListeners() {
                    document.addEventListener('keydown', (e) => {
                        if (!this.gameStarted || this.gameOver) return;

                        const opposites = {
                            'up': 'down',
                            'down': 'up',
                            'left': 'right',
                            'right': 'left'
                        };

                        let newDirection = null;

                        switch (e.key) {
                            case 'ArrowUp':
                            case 'w':
                            case 'W':
                                newDirection = 'up';
                                break;
                            case 'ArrowDown':
                            case 's':
                            case 'S':
                                newDirection = 'down';
                                break;
                            case 'ArrowLeft':
                            case 'a':
                            case 'A':
                                newDirection = 'left';
                                break;
                            case 'ArrowRight':
                            case 'd':
                            case 'D':
                                newDirection = 'right';
                                break;
                        }

                        if (newDirection && opposites[this.direction] !== newDirection) {
                            this.nextDirection = newDirection;
                        }

                        e.preventDefault();
                    });
                },

                loadHighScore() {
                    this.highScore = parseInt(localStorage.getItem('snakeHighScore') || '0');
                },

                saveHighScore() {
                    localStorage.setItem('snakeHighScore', this.highScore.toString());
                }
            }))
        })
    </script>
</x-layout>
