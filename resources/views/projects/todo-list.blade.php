<x-layout>
    <div class="min-h-screen bg-[#1f1f1f] text-white" x-data="todolist">
        <div class="max-w-4xl mx-auto px-6 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">📝 Todo List</h1>
                <p class="text-gray-400">Stay organized and get things done</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-black/30 border border-gray-600 rounded-xl p-4 text-center">
                    <div class="text-2xl font-bold text-blue-400" x-text="todos.length"></div>
                    <div class="text-sm text-gray-400">Total Tasks</div>
                </div>
                <div class="bg-black/30 border border-gray-600 rounded-xl p-4 text-center">
                    <div class="text-2xl font-bold text-green-400" x-text="completedTodos.length"></div>
                    <div class="text-sm text-gray-400">Completed</div>
                </div>
                <div class="bg-black/30 border border-gray-600 rounded-xl p-4 text-center">
                    <div class="text-2xl font-bold text-yellow-400" x-text="pendingTodos.length"></div>
                    <div class="text-sm text-gray-400">Pending</div>
                </div>
                <div class="bg-black/30 border border-gray-600 rounded-xl p-4 text-center">
                    <div class="text-2xl font-bold text-purple-400" x-text="completionPercentage + '%'"></div>
                    <div class="text-sm text-gray-400">Progress</div>
                </div>
            </div>

            <!-- Add Todo Form -->
            <div class="bg-black/30 border border-gray-600 rounded-xl p-6 mb-8">
                <h2 class="text-xl font-semibold mb-6 text-white">Add New Task</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Task Description</label>
                        <input
                            type="text"
                            x-model="newTodo"
                            @keyup.enter="addToDo"
                            placeholder="What needs to be done?"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Priority</label>
                        <select
                            x-model="newPriority"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="low">🟢 Low</option>
                            <option value="medium">🟡 Medium</option>
                            <option value="high">🔴 High</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                        <select
                            x-model="newCategory"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="personal">👤 Personal</option>
                            <option value="work">💼 Work</option>
                            <option value="shopping">🛒 Shopping</option>
                            <option value="health">🏥 Health</option>
                            <option value="learning">📚 Learning</option>
                            <option value="other">📦 Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Due Date (Optional)</label>
                        <input
                            type="date"
                            x-model="newDueDate"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <button
                    @click="addToDo"
                    :disabled="!newTodo.trim()"
                    :class="!newTodo.trim() ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600'"
                    class="w-full md:w-auto px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                    ➕ Add Task
                </button>
            </div>

            <!-- Filters and Search -->
            <div class="bg-black/30 border border-gray-600 rounded-xl p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Search Tasks</label>
                        <input
                            type="text"
                            x-model="searchQuery"
                            placeholder="Search by task name..."
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Filter by Status</label>
                        <select
                            x-model="statusFilter"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="all">All Tasks</option>
                            <option value="pending">Pending Only</option>
                            <option value="completed">Completed Only</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Filter by Category</label>
                        <select
                            x-model="categoryFilter"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="all">All Categories</option>
                            <option value="personal">👤 Personal</option>
                            <option value="work">💼 Work</option>
                            <option value="shopping">🛒 Shopping</option>
                            <option value="health">🏥 Health</option>
                            <option value="learning">📚 Learning</option>
                            <option value="other">📦 Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Todo List -->
            <div class="bg-black/30 border border-gray-600 rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-600 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-white">Your Tasks</h2>
                    <button
                        x-show="completedTodos.length > 0"
                        @click="clearCompleted"
                        class="text-sm text-red-400 hover:text-red-300 transition-colors">
                        Clear Completed
                    </button>
                </div>

                <div x-show="filteredTodos.length === 0" class="p-8 text-center">
                    <div class="text-6xl mb-4">📋</div>
                    <p class="text-gray-400 text-lg">No tasks found</p>
                    <p class="text-gray-500 text-sm">Add your first task above to get started</p>
                </div>

                <div x-show="filteredTodos.length > 0" class="divide-y divide-gray-700">
                    <template x-for="todo in filteredTodos" :key="todo.id">
                        <div class="p-6 hover:bg-gray-700/30 transition-colors">
                            <div class="flex items-start gap-4">
                                <!-- Checkbox -->
                                <label class="flex items-center cursor-pointer mt-1">
                                    <input
                                        type="checkbox"
                                        x-model="todo.completed"
                                        class="sr-only">
                                    <div class="w-5 h-5 border-2 border-gray-400 rounded flex items-center justify-center"
                                         :class="todo.completed ? 'bg-green-500 border-green-500' : 'hover:border-gray-300'">
                                        <svg x-show="todo.completed" class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </label>

                                <!-- Task Content -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h3 class="text-white font-medium"
                                            :class="todo.completed ? 'line-through text-gray-400' : ''"
                                            x-text="todo.text"></h3>

                                        <!-- Priority Badge -->
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                              :class="{
                                                  'bg-red-100 text-red-800': todo.priority === 'high',
                                                  'bg-yellow-100 text-yellow-800': todo.priority === 'medium',
                                                  'bg-green-100 text-green-800': todo.priority === 'low'
                                              }"
                                              x-text="todo.priority.toUpperCase()"></span>
                                    </div>

                                    <div class="flex items-center gap-4 text-sm text-gray-400">
                                        <span x-text="getCategoryIcon(todo.category) + ' ' + todo.category.charAt(0).toUpperCase() + todo.category.slice(1)"></span>
                                        <span x-show="todo.dueDate" x-text="'Due: ' + formatDate(todo.dueDate)"></span>
                                        <span x-text="'Added ' + formatDate(todo.createdAt)"></span>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <button
                                    @click="removeTodo(todo)"
                                    class="text-red-400 hover:text-red-300 transition-colors p-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9zM4 5a2 2 0 012-2h8a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zM8 8a1 1 0 012 0v3a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v3a1 1 0 11-2 0V8z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('todolist', () => ({
                todos: [],
                newTodo: '',
                newPriority: 'medium',
                newCategory: 'personal',
                newDueDate: '',
                searchQuery: '',
                statusFilter: 'all',
                categoryFilter: 'all',

                get completedTodos() {
                    return this.todos.filter(todo => todo.completed);
                },

                get pendingTodos() {
                    return this.todos.filter(todo => !todo.completed);
                },

                get completionPercentage() {
                    if (this.todos.length === 0) return 0;
                    return Math.round((this.completedTodos.length / this.todos.length) * 100);
                },

                get filteredTodos() {
                    return this.todos.filter(todo => {
                        // Search filter
                        const matchesSearch = todo.text.toLowerCase().includes(this.searchQuery.toLowerCase());

                        // Status filter
                        const matchesStatus = this.statusFilter === 'all' ||
                                            (this.statusFilter === 'completed' && todo.completed) ||
                                            (this.statusFilter === 'pending' && !todo.completed);

                        // Category filter
                        const matchesCategory = this.categoryFilter === 'all' || todo.category === this.categoryFilter;

                        return matchesSearch && matchesStatus && matchesCategory;
                    }).sort((a, b) => {
                        // Sort by completion status first (pending first), then by priority
                        if (a.completed !== b.completed) {
                            return a.completed ? 1 : -1;
                        }

                        const priorityOrder = { high: 3, medium: 2, low: 1 };
                        return priorityOrder[b.priority] - priorityOrder[a.priority];
                    });
                },

                addToDo() {
                    if (!this.newTodo.trim()) return;

                    this.todos.push({
                        id: Date.now(),
                        text: this.newTodo.trim(),
                        completed: false,
                        priority: this.newPriority,
                        category: this.newCategory,
                        dueDate: this.newDueDate,
                        createdAt: new Date().toISOString().split('T')[0]
                    });

                    // Reset form
                    this.newTodo = '';
                    this.newPriority = 'medium';
                    this.newCategory = 'personal';
                    this.newDueDate = '';
                },

                removeTodo(todoToRemove) {
                    this.todos = this.todos.filter(todo => todo.id !== todoToRemove.id);
                },

                clearCompleted() {
                    this.todos = this.todos.filter(todo => !todo.completed);
                },

                getCategoryIcon(category) {
                    const icons = {
                        personal: '👤',
                        work: '💼',
                        shopping: '🛒',
                        health: '🏥',
                        learning: '📚',
                        other: '📦'
                    };
                    return icons[category] || '📦';
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

