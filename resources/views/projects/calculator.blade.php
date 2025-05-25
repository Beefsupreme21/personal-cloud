<x-layout>
    <div class="min-h-screen bg-[#1f1f1f] text-white" x-data="calculator">
        <div class="max-w-4xl mx-auto px-6 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">🧮 Calculator</h1>
                <p class="text-gray-400">Perform calculations with style</p>
            </div>

            <div class="flex justify-center">
                <div class="bg-black/30 border border-gray-600 rounded-xl p-6 w-full max-w-sm">
                    <!-- Display -->
                    <div class="mb-6">
                        <!-- Expression Display -->
                        <div class="bg-gray-700 border border-gray-600 rounded-lg p-4 mb-2 min-h-[60px] flex items-center">
                            <div class="w-full text-right">
                                <div class="text-gray-400 text-sm mb-1" x-text="expression || '0'"></div>
                                <div class="text-white text-2xl font-mono" x-text="result || '0'"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Button Grid -->
                    <div class="grid grid-cols-4 gap-3">
                        <!-- Row 1 -->
                        <button @click="clear()"
                                class="col-span-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            Clear
                        </button>
                        <button @click="backspace()"
                                class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-4 rounded-lg transition-colors">
                            ⌫
                        </button>
                        <button @click="addToExpression('/')"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            ÷
                        </button>

                        <!-- Row 2 -->
                        <button @click="addToExpression('7')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            7
                        </button>
                        <button @click="addToExpression('8')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            8
                        </button>
                        <button @click="addToExpression('9')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            9
                        </button>
                        <button @click="addToExpression('*')"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            ×
                        </button>

                        <!-- Row 3 -->
                        <button @click="addToExpression('4')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            4
                        </button>
                        <button @click="addToExpression('5')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            5
                        </button>
                        <button @click="addToExpression('6')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            6
                        </button>
                        <button @click="addToExpression('-')"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            −
                        </button>

                        <!-- Row 4 -->
                        <button @click="addToExpression('1')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            1
                        </button>
                        <button @click="addToExpression('2')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            2
                        </button>
                        <button @click="addToExpression('3')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            3
                        </button>
                        <button @click="addToExpression('+')"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            +
                        </button>

                        <!-- Row 5 -->
                        <button @click="addToExpression('0')"
                                class="col-span-2 bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            0
                        </button>
                        <button @click="addToExpression('.')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            .
                        </button>
                        <button @click="calculate()"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 rounded-lg transition-colors">
                            =
                        </button>
                    </div>

                    <!-- History -->
                    <div x-show="history.length > 0" class="mt-6">
                        <h3 class="text-sm font-medium text-gray-400 mb-3">Recent Calculations</h3>
                        <div class="bg-gray-700/50 rounded-lg p-3 max-h-32 overflow-y-auto">
                            <template x-for="item in history.slice(-5).reverse()" :key="item.id">
                                <div class="text-xs text-gray-300 mb-1 font-mono">
                                    <span x-text="item.expression"></span> = <span x-text="item.result" class="text-blue-400"></span>
                                </div>
                            </template>
                        </div>
                        <button @click="clearHistory()"
                                class="w-full mt-2 text-xs text-gray-500 hover:text-gray-400 transition-colors">
                            Clear History
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('calculator', () => ({
                expression: '',
                result: '0',
                history: [],
                lastCalculation: false,

                addToExpression(value) {
                    // If we just calculated, start fresh with numbers but continue with operators
                    if (this.lastCalculation) {
                        if (['+', '-', '*', '/'].includes(value)) {
                            this.expression = this.result + value;
                        } else {
                            this.expression = value;
                        }
                        this.lastCalculation = false;
                        return;
                    }

                    // Prevent multiple operators in a row
                    const operators = ['+', '-', '*', '/'];
                    const lastChar = this.expression.slice(-1);
                    if (operators.includes(value) && operators.includes(lastChar)) {
                        this.expression = this.expression.slice(0, -1) + value;
                        return;
                    }

                    // Prevent multiple decimal points in the same number
                    if (value === '.') {
                        const parts = this.expression.split(/[+\-*/]/);
                        const currentNumber = parts[parts.length - 1];
                        if (currentNumber.includes('.')) return;
                    }

                    this.expression += value;
                },

                calculate() {
                    if (!this.expression) return;

                    try {
                        // Replace display operators with JavaScript operators
                        let evalExpression = this.expression
                            .replace(/×/g, '*')
                            .replace(/÷/g, '/')
                            .replace(/−/g, '-');

                        const calculatedResult = Function('"use strict"; return (' + evalExpression + ')')();

                        // Handle division by zero and other edge cases
                        if (!isFinite(calculatedResult)) {
                            this.result = 'Error';
                            return;
                        }

                        // Round to avoid floating point precision issues
                        this.result = Math.round(calculatedResult * 100000000) / 100000000;

                        // Add to history
                        this.history.push({
                            id: Date.now(),
                            expression: this.expression,
                            result: this.result
                        });

                        this.lastCalculation = true;
                    } catch (error) {
                        this.result = 'Error';
                    }
                },

                clear() {
                    this.expression = '';
                    this.result = '0';
                    this.lastCalculation = false;
                },

                backspace() {
                    if (this.lastCalculation) {
                        this.clear();
                        return;
                    }
                    this.expression = this.expression.slice(0, -1);
                    if (!this.expression) {
                        this.result = '0';
                    }
                },

                clearHistory() {
                    this.history = [];
                }
            }))
        })
    </script>
</x-layout>
