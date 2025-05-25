<x-layout>
    <div class="min-h-screen bg-[#1f1f1f] text-white" x-data="tracker">
        <div class="max-w-6xl mx-auto px-6 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">💰 Expense Tracker</h1>
                <p class="text-slate-400">Track your income and expenses with ease</p>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-green-500/20 border border-green-500/30 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-400 text-sm font-medium">Total Income</p>
                            <p class="text-2xl font-bold text-green-400" x-text="'$' + totalIncome.toFixed(2)"></p>
                        </div>
                        <div class="text-green-400 text-3xl">📈</div>
                    </div>
                </div>

                <div class="bg-red-500/20 border border-red-500/30 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-red-400 text-sm font-medium">Total Expenses</p>
                            <p class="text-2xl font-bold text-red-400" x-text="'$' + totalExpenses.toFixed(2)"></p>
                        </div>
                        <div class="text-red-400 text-3xl">📉</div>
                    </div>
                </div>

                <div class="bg-blue-500/20 border border-blue-500/30 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-400 text-sm font-medium">Net Balance</p>
                            <p class="text-2xl font-bold"
                               :class="netBalance >= 0 ? 'text-green-400' : 'text-red-400'"
                               x-text="'$' + netBalance.toFixed(2)"></p>
                        </div>
                        <div class="text-blue-400 text-3xl">💳</div>
                    </div>
                </div>
            </div>

            <!-- Add Transaction Form -->
            <div class="bg-black/30 border border-gray-600 rounded-xl p-6 mb-8">
                <h2 class="text-xl font-semibold mb-6 text-white">Add New Transaction</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div>
                                                <label class="block text-sm font-medium text-gray-300 mb-2">Amount</label>
                        <input
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            type="number"
                            step="0.01"
                            x-model="amount"
                            placeholder="0.00">
                    </div>

                    <div>
                                                <label class="block text-sm font-medium text-gray-300 mb-2">Date</label>
                        <input
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            type="date"
                            x-model="date">
                    </div>

                    <div>
                                                <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                        <select
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            x-model="category">
                            <option value="">Choose category</option>
                            <option value="salary">💼 Salary</option>
                            <option value="freelance">💻 Freelance</option>
                            <option value="investment">📊 Investment</option>
                            <option value="rent">🏠 Rent</option>
                            <option value="utilities">⚡ Utilities</option>
                            <option value="food">🍕 Food</option>
                            <option value="entertainment">🎬 Entertainment</option>
                            <option value="transport">🚗 Transport</option>
                            <option value="healthcare">🏥 Healthcare</option>
                            <option value="shopping">🛍️ Shopping</option>
                            <option value="misc">📦 Miscellaneous</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Type</label>
                        <div class="flex gap-4 pt-3">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" value="income" x-model="expense_type" class="sr-only">
                                <div class="w-4 h-4 border-2 border-green-400 rounded-full mr-2 flex items-center justify-center"
                                     :class="expense_type === 'income' ? 'bg-green-400' : ''">
                                    <div x-show="expense_type === 'income'" class="w-2 h-2 bg-white rounded-full"></div>
                                </div>
                                <span class="text-green-400 font-medium">Income</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" value="expense" x-model="expense_type" class="sr-only">
                                <div class="w-4 h-4 border-2 border-red-400 rounded-full mr-2 flex items-center justify-center"
                                     :class="expense_type === 'expense' ? 'bg-red-400' : ''">
                                    <div x-show="expense_type === 'expense'" class="w-2 h-2 bg-white rounded-full"></div>
                                </div>
                                <span class="text-red-400 font-medium">Expense</span>
                            </label>
                        </div>
                    </div>
                </div>

                <button
                    @click="addExpense"
                    :disabled="!amount || !category || !expense_type"
                    :class="(!amount || !category || !expense_type) ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600'"
                    class="w-full md:w-auto px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                    Add Transaction
                </button>
            </div>

            <!-- Transactions List -->
            <div class="bg-black/30 border border-gray-600 rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-600">
                    <h2 class="text-xl font-semibold text-white">Recent Transactions</h2>
                </div>

                <div x-show="expenses.length === 0" class="p-8 text-center">
                    <div class="text-6xl mb-4">📊</div>
                    <p class="text-gray-400 text-lg">No transactions yet</p>
                    <p class="text-gray-500 text-sm">Add your first transaction above to get started</p>
                </div>

                <div x-show="expenses.length > 0" class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-700/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <template x-for="expense in sortedExpenses" :key="expense.id">
                                <tr class="hover:bg-gray-700/30 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-lg font-semibold"
                                              :class="expense.expense_type === 'income' ? 'text-green-400' : 'text-red-400'"
                                              x-text="(expense.expense_type === 'income' ? '+' : '-') + '$' + parseFloat(expense.amount).toFixed(2)"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-gray-300 capitalize" x-text="expense.category"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-gray-400" x-text="formatDate(expense.date)"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                              :class="expense.expense_type === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
                                              x-text="expense.expense_type === 'income' ? 'Income' : 'Expense'"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button
                                            @click="removeExpense(expense)"
                                            class="text-red-400 hover:text-red-300 font-medium transition-colors">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('tracker', () => ({
                expenses: [],
                amount: '',
                category: '',
                date: new Date().toISOString().split('T')[0], // Default to today
                expense_type: '',

                get totalIncome() {
                    return this.expenses
                        .filter(expense => expense.expense_type === 'income')
                        .reduce((sum, expense) => sum + parseFloat(expense.amount || 0), 0);
                },

                get totalExpenses() {
                    return this.expenses
                        .filter(expense => expense.expense_type === 'expense')
                        .reduce((sum, expense) => sum + parseFloat(expense.amount || 0), 0);
                },

                get netBalance() {
                    return this.totalIncome - this.totalExpenses;
                },

                get sortedExpenses() {
                    return this.expenses.slice().sort((a, b) => new Date(b.date) - new Date(a.date));
                },

                addExpense() {
                    if (!this.amount || !this.category || !this.expense_type) return;

                    let id = Date.now(); // Use timestamp for unique ID
                    this.expenses.push({
                        id: id,
                        amount: this.amount,
                        category: this.category,
                        date: this.date,
                        expense_type: this.expense_type,
                    });

                    // Reset form
                    this.amount = "";
                    this.category = "";
                    this.expense_type = "";
                },

                removeExpense(expenseToRemove) {
                    this.expenses = this.expenses.filter(expense => expense.id !== expenseToRemove.id);
                },

                formatDate(dateString) {
                    return new Date(dateString).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    });
                }
            }))
        })
    </script>
</x-layout>
