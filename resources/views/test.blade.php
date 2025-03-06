<x-layout>
    <div>
        <h1>Array of simple vars</h1>
        <div x-data="{items: ['one', 'two']}">
          <template x-for="item in items">
            <div>
              <span x-text="item"></span>
              <button x-on:click="item = 'foo'">Set to foo</button>
              <input type="text" x-model="item" />
            </div>
          </template>
        </div>
        
        <h1>Array of simple vars</h1>
        <div x-data="{ items: ['one', 'two', 'three', 'four'], selectedOptions: [] }">
          <template x-for="(item, index) in items">
            <div>
              <label>
                <input type="checkbox" x-model="selectedOptions" :value="item" />
                <span x-text="item"></span>
              </label>
            </div>
          </template>

          <p>Selected Options</p>
          <template x-for="option in selectedOptions">
            <span x-text="option"></span>
          </template>
        </div>
        
        <div>
          <ul x-data="{ colors: ['Red', 'Orange', 'Yellow'] }">
            <template x-for="(color, index) in colors">
                <li>
                    <span x-text="index + ': '"></span>
                    <span x-text="color"></span>
                </li>
            </template>
          </ul> 
        </div>
        
        
    </div>
</x-layout>