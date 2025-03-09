<div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
  <div x-show="open" class="fixed inset-0 bg-[#1b1b1c] bg-opacity-75"></div>

  <div x-show="open"
        x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 flex">
    <div class="relative flex w-full max-w-xs flex-1 flex-col bg-[#1f1f1f] shadow-[1px_0_1rem_rgba(0,0,0,1)]">

      <div class="absolute top-0 right-0 -mr-12 pt-2">
        <button x-on:click="open = ! open" type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
          <span class="sr-only">Close sidebar</span>
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="h-0 flex-1 overflow-y-auto pt-5 pb-4">
        <div class="flex flex-shrink-0 items-center px-6">
            <a href="/" class="flex items-center py-1 font-bold rounded-md text-white">
                <span class="text-3xl">SANDA</span>
                <span class="text-3xl text-[#77C1D2]">DEV</span>
            </a>
        </div>
        <nav class="mt-5 space-y-1 px-2">
            <a href="/" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] uppercase flex items-center px-6 py-1 font-bold rounded-m">
                <x-svg.house class="w-8 h-8" />
                <span class="ml-2">Home</span>
            </a>
            <a href="/games" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] uppercase flex items-center px-6 py-1 font-bold rounded-m">
                <x-svg.puzzle class="w-8 h-8" />
                <span class="ml-2">Games</span>
            </a>
            <a href="/projects" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center px-6 py-1 font-bold rounded-md">
                <x-svg.trophy class="w-8 h-8" />
                <span class="ml-2 uppercase">Projects</span>
            </a>
            <a href="/test" class="text-gray-300 text-lg hover:bg-gray-700 hover:text-[#77C1D2] flex items-center mt-8 px-6 py-1 font-bold rounded-md">
                <x-svg.beaker class="w-8 h-8" />
                <span class="ml-2 uppercase">Testing</span>
            </a>
        </nav>
      </div>
    </div>

    <div class="w-14 flex-shrink-0">
      <!-- Force sidebar to shrink to fit close icon -->
    </div>
  </div>
</div>
