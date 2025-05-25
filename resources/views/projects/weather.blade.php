<x-layout>
    <div class="min-h-screen bg-[#1f1f1f] text-white" x-data="weather" x-init="fetchWeather()">
        <div class="max-w-6xl mx-auto px-6 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">🌤️ Weather Dashboard</h1>
                <p class="text-gray-400">Real-time weather information and forecasts</p>
            </div>



            <!-- Loading State -->
            <div x-show="loading" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
                <p class="text-gray-400 mt-4">Loading weather data...</p>
            </div>

            <!-- Error State -->
            <div x-show="error" class="bg-red-500/20 border border-red-500/30 rounded-xl p-6 mb-8">
                <div class="flex items-center gap-3">
                    <div class="text-red-400 text-2xl">⚠️</div>
                    <div>
                        <h3 class="text-red-400 font-semibold">Error Loading Weather Data</h3>
                        <p class="text-red-300 text-sm" x-text="error"></p>
                    </div>
                </div>
            </div>

            <!-- Current Weather -->
            <div x-show="weather && !loading" class="bg-black/30 border border-gray-600 rounded-xl p-6 mb-8">
                <h2 class="text-2xl font-semibold mb-6 text-white">Current Weather</h2>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Main Temperature Display -->
                    <div class="lg:col-span-1 flex items-center justify-center">
                        <div class="text-center">
                            <img x-bind:src="getWeatherIcon(weather?.current_weather?.weathercode)"
                                 alt="weather icon"
                                 class="w-32 h-32 mx-auto mb-4">
                            <div class="flex items-center justify-center gap-2">
                                <span class="text-6xl font-bold" x-text="Math.round(weather?.current_weather?.temperature || 0)"></span>
                                <span class="text-3xl text-gray-400">°F</span>
                            </div>
                            <p class="text-gray-400 mt-2" x-text="getWeatherDescription(weather?.current_weather?.weathercode)"></p>
                        </div>
                    </div>

                    <!-- Weather Details -->
                    <div class="lg:col-span-2 grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                            <div class="text-2xl mb-2">🌡️</div>
                            <div class="text-sm text-gray-400">Feels Like</div>
                            <div class="text-xl font-semibold" x-text="Math.round(weather?.daily?.apparent_temperature_max?.[0] || 0) + '°'"></div>
                        </div>

                        <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                            <div class="text-2xl mb-2">💨</div>
                            <div class="text-sm text-gray-400">Wind Speed</div>
                            <div class="text-xl font-semibold" x-text="(weather?.current_weather?.windspeed || 0) + ' mph'"></div>
                        </div>

                        <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                            <div class="text-2xl mb-2">💧</div>
                            <div class="text-sm text-gray-400">Precipitation</div>
                            <div class="text-xl font-semibold" x-text="(weather?.daily?.precipitation_sum?.[0] || 0) + ' in'"></div>
                        </div>

                        <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                            <div class="text-2xl mb-2">🧭</div>
                            <div class="text-sm text-gray-400">Wind Direction</div>
                            <div class="text-xl font-semibold" x-text="(weather?.current_weather?.winddirection || 0) + '°'"></div>
                        </div>
                    </div>
                </div>

                <!-- High/Low Temperatures -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                    <div class="bg-red-500/20 border border-red-500/30 rounded-lg p-4 text-center">
                        <div class="text-red-400 text-sm font-medium">Today's High</div>
                        <div class="text-2xl font-bold text-red-400" x-text="Math.round(weather?.daily?.temperature_2m_max?.[0] || 0) + '°'"></div>
                    </div>

                    <div class="bg-blue-500/20 border border-blue-500/30 rounded-lg p-4 text-center">
                        <div class="text-blue-400 text-sm font-medium">Today's Low</div>
                        <div class="text-2xl font-bold text-blue-400" x-text="Math.round(weather?.daily?.temperature_2m_min?.[0] || 0) + '°'"></div>
                    </div>

                    <div class="bg-orange-500/20 border border-orange-500/30 rounded-lg p-4 text-center">
                        <div class="text-orange-400 text-sm font-medium">Feels High</div>
                        <div class="text-2xl font-bold text-orange-400" x-text="Math.round(weather?.daily?.apparent_temperature_max?.[0] || 0) + '°'"></div>
                    </div>

                    <div class="bg-cyan-500/20 border border-cyan-500/30 rounded-lg p-4 text-center">
                        <div class="text-cyan-400 text-sm font-medium">Feels Low</div>
                        <div class="text-2xl font-bold text-cyan-400" x-text="Math.round(weather?.daily?.apparent_temperature_min?.[0] || 0) + '°'"></div>
                    </div>
                </div>
            </div>

            <!-- 7-Day Forecast -->
            <div x-show="weather && !loading" class="bg-black/30 border border-gray-600 rounded-xl p-6 mb-8">
                <h2 class="text-2xl font-semibold mb-6 text-white">7-Day Forecast</h2>

                <div class="grid grid-cols-1 md:grid-cols-7 gap-4">
                    <template x-for="(day, index) in weather?.daily?.time?.slice(0, 7)" :key="index">
                        <div @click="selectedDay = day"
                             :class="selectedDay === day ? 'bg-blue-500/20 border-blue-500' : 'bg-gray-700/30 border-gray-600'"
                             class="border rounded-lg p-4 cursor-pointer hover:bg-gray-600/30 transition-colors">
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-300 mb-2" x-text="getDayOfWeek(day)"></div>
                                <img :src="getWeatherIcon(weather?.daily?.weathercode?.[index])"
                                     alt="weather icon"
                                     class="w-12 h-12 mx-auto mb-2">
                                <div class="text-lg font-semibold" x-text="Math.round(weather?.daily?.temperature_2m_max?.[index] || 0) + '°'"></div>
                                <div class="text-sm text-gray-400" x-text="Math.round(weather?.daily?.temperature_2m_min?.[index] || 0) + '°'"></div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Hourly Forecast -->
            <div x-show="selectedDay && weather && !loading" class="bg-black/30 border border-gray-600 rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-600">
                    <h2 class="text-xl font-semibold text-white">
                        Hourly Forecast - <span x-text="getDayOfWeek(selectedDay)"></span>
                    </h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-700/50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase">Time</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase">Weather</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase">Temp</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase">Feels Like</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase">Wind</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase">Precipitation</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <template x-for="(hour, hourIndex) in weather?.hourly?.time" :key="hourIndex">
                                <template x-if="isWithinDay(hour, selectedDay)">
                                    <tr class="hover:bg-gray-700/30 transition-colors">
                                        <td class="px-4 py-3">
                                            <div class="font-medium" x-text="formatHour(hour)"></div>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <img :src="getWeatherIcon(weather?.hourly?.weathercode?.[hourIndex])"
                                                 alt="weather icon"
                                                 class="w-8 h-8 mx-auto">
                                        </td>
                                        <td class="px-4 py-3 text-center font-semibold">
                                            <span x-text="Math.round(weather?.hourly?.temperature_2m?.[hourIndex] || 0)"></span>°
                                        </td>
                                        <td class="px-4 py-3 text-center text-gray-400">
                                            <span x-text="Math.round(weather?.hourly?.apparent_temperature?.[hourIndex] || 0)"></span>°
                                        </td>
                                        <td class="px-4 py-3 text-center text-gray-400">
                                            <span x-text="(weather?.hourly?.windspeed_10m?.[hourIndex] || 0)"></span> mph
                                        </td>
                                        <td class="px-4 py-3 text-center text-gray-400">
                                            <span x-text="(weather?.hourly?.precipitation?.[hourIndex] || 0)"></span> in
                                        </td>
                                    </tr>
                                </template>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('weather', () => ({
                weather: null,
                selectedDay: null,
                loading: false,
                error: null,

                getDayOfWeek(timestamp) {
                    const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    const date = new Date(timestamp * 1000);
                    const today = new Date();

                    if (date.toDateString() === today.toDateString()) {
                        return 'Today';
                    }

                    const tomorrow = new Date(today);
                    tomorrow.setDate(today.getDate() + 1);
                    if (date.toDateString() === tomorrow.toDateString()) {
                        return 'Tomorrow';
                    }

                    return daysOfWeek[date.getUTCDay()];
                },

                formatHour(timestamp) {
                    const date = new Date(timestamp * 1000);
                    return date.toLocaleTimeString([], {
                        hour: 'numeric',
                        hour12: true
                    });
                },

                async fetchWeather() {
                    this.loading = true;
                    this.error = null;

                    try {
                        const response = await axios.get(`https://api.open-meteo.com/v1/forecast?latitude=39.74&longitude=-104.98&hourly=temperature_2m,apparent_temperature,precipitation,weathercode,windspeed_10m&daily=weathercode,temperature_2m_max,temperature_2m_min,apparent_temperature_max,apparent_temperature_min,precipitation_sum&current_weather=true&temperature_unit=fahrenheit&windspeed_unit=mph&precipitation_unit=inch&timeformat=unixtime&timezone=auto`);
                        this.weather = response.data;
                    } catch (error) {
                        this.error = 'Failed to fetch weather data. Please try again.';
                        console.error('Weather fetch error:', error);
                    } finally {
                        this.loading = false;
                    }
                },



                isWithinDay(timestamp, day) {
                    const selectedDate = new Date(day * 1000);
                    const date = new Date(timestamp * 1000);
                    return (
                        date.getFullYear() === selectedDate.getFullYear() &&
                        date.getMonth() === selectedDate.getMonth() &&
                        date.getDate() === selectedDate.getDate()
                    );
                },

                getWeatherIcon(code) {
                    if (code === 0 || code === 1) {
                        return '/images/weather-icons/sun.svg';
                    } else if (code === 2) {
                        return '/images/weather-icons/cloud-sun.svg';
                    } else if (code === 3) {
                        return '/images/weather-icons/cloud.svg';
                    } else if (code === 45 || code === 48) {
                        return '/images/weather-icons/smog.svg';
                    } else if (code >= 51 && code <= 67 || code === 80 || code === 81 || code === 82) {
                        return '/images/weather-icons/cloud-showers-heavy.svg';
                    } else if (code === 71 || code === 73 || code === 75 || code === 77 || code === 85 || code === 86) {
                        return '/images/weather-icons/snowflake.svg';
                    } else if (code === 95 || code === 96 || code === 99) {
                        return '/images/weather-icons/cloud-bolt.svg';
                    } else {
                        return '/images/weather-icons/cloud.svg';
                    }
                },

                getWeatherDescription(code) {
                    const descriptions = {
                        0: 'Clear sky',
                        1: 'Mainly clear',
                        2: 'Partly cloudy',
                        3: 'Overcast',
                        45: 'Fog',
                        48: 'Depositing rime fog',
                        51: 'Light drizzle',
                        53: 'Moderate drizzle',
                        55: 'Dense drizzle',
                        61: 'Slight rain',
                        63: 'Moderate rain',
                        65: 'Heavy rain',
                        71: 'Slight snow',
                        73: 'Moderate snow',
                        75: 'Heavy snow',
                        95: 'Thunderstorm',
                        96: 'Thunderstorm with hail',
                        99: 'Thunderstorm with heavy hail'
                    };
                    return descriptions[code] || 'Unknown';
                }
            }))
        })
    </script>
</x-layout>
