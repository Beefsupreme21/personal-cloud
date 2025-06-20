<x-layout>
    <div x-data="trexGame" class="max-w-4xl mx-auto my-12">
        <div class="bg-[#1b1b1c] rounded-2xl shadow-2xl p-8 border border-gray-700">
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

            <!-- Game Canvas -->
            <div class="flex justify-center mb-4">
                <canvas id="gameCanvas" width="800" height="300" class="border-2 border-[#77C1D2] rounded-lg bg-white"></canvas>
            </div>

            <!-- Game Over Message -->
            <div x-show="gameOver" x-cloak class="text-center mb-4">
                <p class="text-2xl font-bold text-red-400 mb-2">Game Over!</p>
                <p class="text-[#77C1D2] mb-4">Score: <span x-text="score"></span></p>
                <button x-on:click="restartGame()" class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 border border-[#77C1D2]">
                    Play Again
                </button>
            </div>

            <div class="text-center text-[#77C1D2]">
                <p class="mb-2">Press SPACE or click to jump</p>
                <p class="text-sm">Avoid the obstacles and survive as long as possible!</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('trexGame', () => ({
                // Game state
                gameOver: false,
                score: 0,
                highScore: 0,
                gameInterval: null,
                canvas: null,
                ctx: null,

                // T-Rex properties
                trexX: 50,
                trexY: 0,
                trexWidth: 32,
                trexHeight: 48,
                trexVelocity: 0,
                isJumping: false,
                isHoldingJump: false,
                jumpStartTime: 0,

                // Obstacles
                obstacles: [],
                obstacleSpeed: 3,
                obstacleSpawnRate: 0.005,

                // Game settings
                gravity: 0.8,
                jumpPower: -12,
                maxJumpHoldTime: 500, // milliseconds
                groundY: 250,

                init() {
                    this.loadHighScore();
                    this.setupCanvas();
                    this.setupKeyListeners();
                    this.startGame();
                },

                setupCanvas() {
                    this.canvas = document.getElementById('gameCanvas');
                    this.ctx = this.canvas.getContext('2d');
                },

                startGame() {
                    this.gameOver = false;
                    this.score = 0;
                    this.trexY = this.groundY;
                    this.trexVelocity = 0;
                    this.isJumping = false;
                    this.obstacles = [];
                    this.obstacleSpeed = 3;
                    this.obstacleSpawnRate = 0.005;

                    this.gameInterval = setInterval(() => this.gameLoop(), 16); // ~60 FPS
                },

                gameLoop() {
                    if (this.gameOver) return;

                    this.updateTrex();
                    this.updateObstacles();
                    this.checkCollisions();
                    this.updateScore();
                    this.draw();
                },

                updateTrex() {
                    // Apply gravity
                    this.trexVelocity += this.gravity;
                    this.trexY += this.trexVelocity;

                    // Variable jump height - if holding jump and still going up, reduce gravity
                    if (this.isHoldingJump && this.isJumping && this.trexVelocity < 0) {
                        const jumpHoldTime = Date.now() - this.jumpStartTime;
                        if (jumpHoldTime < this.maxJumpHoldTime) {
                            this.trexVelocity += this.gravity * -0.5; // Actually push up while holding
                        }
                    }

                    // Ground collision
                    if (this.trexY >= this.groundY) {
                        this.trexY = this.groundY;
                        this.trexVelocity = 0;
                        this.isJumping = false;
                        this.isHoldingJump = false;
                    }
                },

                updateObstacles() {
                    // Move existing obstacles
                    this.obstacles.forEach(obstacle => {
                        obstacle.x -= this.obstacleSpeed;
                    });

                    // Remove obstacles that are off screen
                    this.obstacles = this.obstacles.filter(obstacle => obstacle.x > -50);

                    // Spawn new obstacles
                    if (Math.random() < this.obstacleSpawnRate) {
                        this.obstacles.push({
                            id: Date.now() + Math.random(),
                            x: 800,
                            y: this.groundY,
                            width: 24,
                            height: 32
                        });
                    }

                    // Increase difficulty over time
                    this.obstacleSpeed += 0.005;
                    this.obstacleSpawnRate += 0.00005;
                },

                checkCollisions() {
                    this.obstacles.forEach(obstacle => {
                        if (this.trexX < obstacle.x + obstacle.width &&
                            this.trexX + this.trexWidth > obstacle.x &&
                            this.trexY < obstacle.y + obstacle.height &&
                            this.trexY + this.trexHeight > obstacle.y) {
                            this.endGame();
                        }
                    });
                },

                updateScore() {
                    this.score++;
                },

                draw() {
                    // Clear canvas
                    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

                    // Draw ground
                    this.ctx.fillStyle = '#374151';
                    this.ctx.fillRect(0, this.groundY + this.trexHeight, this.canvas.width, 2);

                    // Draw T-Rex
                    this.ctx.fillStyle = '#111827';
                    this.ctx.fillRect(this.trexX, this.trexY, this.trexWidth, this.trexHeight);

                    // Draw obstacles
                    this.ctx.fillStyle = '#166534';
                    this.obstacles.forEach(obstacle => {
                        this.ctx.fillRect(obstacle.x, obstacle.y, obstacle.width, obstacle.height);
                    });
                },

                jump() {
                    if (!this.isJumping && !this.gameOver) {
                        this.trexVelocity = this.jumpPower;
                        this.isJumping = true;
                        this.isHoldingJump = true;
                        this.jumpStartTime = Date.now();
                    }
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
                        if (e.code === 'Space') {
                            e.preventDefault();
                            if (!this.isJumping && !this.gameOver) {
                                this.jump();
                            }
                            this.isHoldingJump = true;
                        }
                    });

                    document.addEventListener('keyup', (e) => {
                        if (e.code === 'Space') {
                            this.isHoldingJump = false;
                        }
                    });

                    // Mouse controls for variable jump height
                    document.addEventListener('mousedown', () => {
                        if (!this.isJumping && !this.gameOver) {
                            this.jump();
                        }
                        this.isHoldingJump = true;
                    });

                    document.addEventListener('mouseup', () => {
                        this.isHoldingJump = false;
                    });
                },

                loadHighScore() {
                    this.highScore = parseInt(localStorage.getItem('trexHighScore') || '0');
                },

                saveHighScore() {
                    localStorage.setItem('trexHighScore', this.highScore.toString());
                }
            }))
        })
    </script>
</x-layout>
