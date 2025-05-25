<x-layout>
    <div x-data="pokemon" x-init="fetchPokemon()">
        <!-- Header with Search and Filters -->
        <div class="border border-gray-400 p-6 rounded-lg my-6">
            <h1 class="text-3xl font-bold text-white mb-4">🔍 Pokédex Explorer</h1>

            <!-- Search Bar -->
            <div class="mb-4">
                <input
                    type="text"
                    x-model="searchTerm"
                    placeholder="Search Pokémon by name..."
                    class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- Type Filter Buttons -->
            <div class="mb-4">
                <h3 class="text-white text-sm font-medium mb-2">Filter by Type:</h3>
                <div class="flex flex-wrap gap-2">
                    <button
                        @click="selectedType = ''"
                        :class="selectedType === '' ? 'ring-2 ring-white' : ''"
                        class="px-3 py-1 rounded-full text-sm font-medium bg-gray-600 text-white hover:bg-gray-500 transition-colors">
                        All Types
                    </button>
                    <template x-for="type in availableTypes" :key="type">
                        <button
                            @click="selectedType = type"
                            class="px-3 py-1 rounded-full text-sm font-medium capitalize hover:opacity-80 transition-opacity"
                            :class="[
                                ...getTextColor(type),
                                selectedType === type ? 'ring-2 ring-white' : ''
                            ]"
                            x-text="type">
                        </button>
                    </template>
                </div>
            </div>

            <!-- Results Count -->
            <div class="text-gray-300 text-sm">
                Showing <span x-text="filteredPokemon.length"></span> of <span x-text="pokemons ? pokemons.length : 0"></span> Pokémon
            </div>
        </div>

        <!-- Pokemon List -->
        <ul class="divide-y divide-gray-500 p-4 border border-gray-400 rounded-lg">
            <template x-for="pokemon in filteredPokemon" :key="pokemon.name">
                <li class="py-4">
                    <div class="flex items-center justify-between cursor-pointer hover:bg-gray-700 p-3 rounded-lg transition-colors"
                         @click="openPokemonModal(pokemon)">
                        <h2 class="text-lg font-medium text-white">
                            <span class="mr-2 text-gray-400">#<span x-text="pokemon.id.toString().padStart(3, '0')"></span></span>
                            <span class="capitalize" x-text="pokemon.name"></span>
                        </h2>
                        <div class="flex w-40">
                            <template x-for="type in pokemon.types" :key="type.type.name">
                                <span class="inline-flex items-center px-2.5 py-0.5 mx-1 rounded-full text-sm font-medium capitalize"
                                    x-bind:class="getTextColor(type.type.name)"
                                    x-text="type.type.name">
                                </span>
                            </template>
                        </div>
                    </div>
                </li>
            </template>

            <!-- No Results Message -->
            <li x-show="filteredPokemon.length === 0 && pokemons" class="py-8 text-center">
                <div class="text-gray-400">
                    <div class="text-4xl mb-2">😔</div>
                    <div>No Pokémon found matching your search.</div>
                </div>
            </li>
        </ul>

        <!-- Pokemon Detail Modal -->
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
             @click="closeModal()">

            <div class="bg-gray-800 rounded-lg p-6 max-w-md w-full mx-4 max-h-[90vh] overflow-y-auto"
                 @click.stop>

                <!-- Close Button -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-white capitalize" x-text="selectedPokemon?.name"></h2>
                                        <button @click="closeModal()"
                            class="text-gray-400 hover:text-white text-2xl cursor-pointer p-2 hover:bg-gray-700 rounded-lg transition-colors w-10 h-10 flex items-center justify-center">
                        ✕
                    </button>
                </div>

                <template x-if="selectedPokemon">
                    <div>
                                                <!-- Pokemon Image -->
                        <div class="text-center mb-6">
                            <div class="relative inline-block">
                                <img :src="showShiny ? selectedPokemon.sprites?.front_shiny : selectedPokemon.sprites?.front_default"
                                     :alt="selectedPokemon.name + (showShiny ? ' (Shiny)' : '')"
                                     class="w-48 h-48 mx-auto bg-gray-700 rounded-lg">

                                <!-- Shiny Toggle Button -->
                                <button @click="showShiny = !showShiny"
                                        :class="showShiny ? 'bg-yellow-500 bg-opacity-80 hover:bg-opacity-90' : 'bg-black bg-opacity-30 hover:bg-opacity-50'"
                                        class="absolute top-2 right-2 text-white p-2 rounded-full transition-all shadow-sm"
                                        :title="showShiny ? 'Show Normal' : 'Show Shiny'">
                                    <span class="text-lg">✨</span>
                                </button>
                            </div>

                            <p class="text-gray-400 mt-2">
                                #<span x-text="selectedPokemon.id.toString().padStart(3, '0')"></span>
                                <span x-show="showShiny" class="text-yellow-400 ml-2">✨ Shiny</span>
                            </p>
                        </div>

                        <!-- Types -->
                        <div class="mb-4">
                            <h3 class="text-white font-semibold mb-2">Types</h3>
                            <div class="flex gap-2">
                                <template x-for="type in selectedPokemon.types" :key="type.type.name">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium capitalize"
                                        :class="getTextColor(type.type.name)"
                                        x-text="type.type.name">
                                    </span>
                                </template>
                            </div>
                        </div>

                        <!-- Physical Stats -->
                        <div class="mb-4">
                            <h3 class="text-white font-semibold mb-2">Physical</h3>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="bg-gray-700 p-3 rounded">
                                    <div class="text-gray-400">Height</div>
                                    <div class="text-white font-medium" x-text="(selectedPokemon.height / 10) + ' m'"></div>
                                </div>
                                <div class="bg-gray-700 p-3 rounded">
                                    <div class="text-gray-400">Weight</div>
                                    <div class="text-white font-medium" x-text="(selectedPokemon.weight / 10) + ' kg'"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Base Stats -->
                        <div class="mb-4">
                            <h3 class="text-white font-semibold mb-2">Base Stats</h3>
                            <template x-for="stat in selectedPokemon.stats" :key="stat.stat.name">
                                <div class="mb-2">
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-gray-400 capitalize" x-text="stat.stat.name.replace('-', ' ')"></span>
                                        <span class="text-white" x-text="stat.base_stat"></span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="bg-blue-500 h-2 rounded-full"
                                             :style="`width: ${Math.min(stat.base_stat / 255 * 100, 100)}%`"></div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Abilities -->
                        <div class="mb-4">
                            <h3 class="text-white font-semibold mb-2">Abilities</h3>
                            <div class="flex flex-wrap gap-2">
                                <template x-for="ability in selectedPokemon.abilities" :key="ability.ability.name">
                                    <span class="bg-gray-700 text-white px-3 py-1 rounded-full text-sm capitalize"
                                          x-text="ability.ability.name.replace('-', ' ')">
                                    </span>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pokemon', () => ({
                pokemons: null,
                searchTerm: '',
                selectedType: '',
                randomType: null,
                selectedPokemon: null,
                showModal: false,
                showShiny: false,

                get availableTypes() {
                    if (!this.pokemons) return [];
                    const types = new Set();
                    this.pokemons.forEach(pokemon => {
                        if (pokemon.types) {
                            pokemon.types.forEach(type => types.add(type.type.name));
                        }
                    });
                    return Array.from(types).sort();
                },

                get filteredPokemon() {
                    if (!this.pokemons) return [];

                    return this.pokemons.filter(pokemon => {
                        // Search filter
                        const matchesSearch = pokemon.name.toLowerCase().includes(this.searchTerm.toLowerCase());

                        // Type filter
                        const matchesType = !this.selectedType ||
                            (pokemon.types && pokemon.types.some(type => type.type.name === this.selectedType));

                        return matchesSearch && matchesType;
                    });
                },

                fetchPokemon() {
                    axios.get('https://pokeapi.co/api/v2/pokemon?limit=150')
                        .then(response => {
                            this.pokemons = response.data.results;
                            Promise.all(this.pokemons.map(pokemon => axios.get(pokemon.url)))
                                .then(responses => {
                                    responses.forEach((response, i) => {
                                        console.log('Pokemon data:', response.data); // Let's see what we're getting!
                                        // Store all the Pokemon data we need
                                        this.pokemons[i] = {
                                            ...this.pokemons[i],
                                            ...response.data
                                        };
                                    });
                                });
                        });
                },

                getTextColor(type) {
                    switch (type) {
                        case 'normal':
                        return ['text-gray-400', 'bg-gray-200'];
                        case 'fire':
                        return ['text-white', 'bg-red-500'];
                        case 'water':
                        return ['text-white', 'bg-blue-500'];
                        case 'electric':
                        return ['text-black', 'bg-yellow-500'];
                        case 'grass':
                        return ['text-black', 'bg-green-500'];
                        case 'ice':
                        return ['text-white', 'bg-blue-200'];
                        case 'fighting':
                        return ['text-white', 'bg-red-900'];
                        case 'poison':
                        return ['text-white', 'bg-purple-500'];
                        case 'ground':
                        return ['text-white', 'bg-yellow-700'];
                        case 'flying':
                        return ['text-white', 'bg-indigo-500'];
                        case 'psychic':
                        return ['text-white', 'bg-pink-500'];
                        case 'bug':
                        return ['text-white', 'bg-green-700'];
                        case 'rock':
                        return ['text-white', 'bg-yellow-500'];
                        case 'ghost':
                        return ['text-white', 'bg-purple-700'];
                        case 'dragon':
                        return ['text-white', 'bg-purple-500'];
                        case 'dark':
                        return ['text-white', 'bg-gray-800'];
                        case 'steel':
                        return ['text-black', 'bg-gray-500'];
                        case 'fairy':
                        return ['text-black', 'bg-pink-300'];
                        default:
                        return ['text-gray-400', 'bg-gray-200'];
                    }
                },

                openPokemonModal(pokemon) {
                    this.selectedPokemon = pokemon;
                    this.showModal = true;
                    this.showShiny = false; // Reset to normal view for each Pokemon
                    document.body.style.overflow = 'hidden'; // Prevent background scrolling
                },

                closeModal() {
                    this.showModal = false;
                    this.selectedPokemon = null;
                    document.body.style.overflow = 'auto'; // Restore scrolling
                },

            }))
        })
    </script>
</x-layout>
