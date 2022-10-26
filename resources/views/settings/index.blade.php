<x-app-layout>
  <x-slot name="header">
    <div class="flex">
      <div class="grow">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-2">
          {{ __('Settings') }}
        </h2>
      </div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow-sm">
        <div class="bg-white border-b border-gray-200">
          
          @foreach($groupedSettings as $groupName => $groupSettings)
            @foreach($groupSettings as $setting)
              {{ $setting->friendly_name }}
            @endforeach
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
</x-app-layout>