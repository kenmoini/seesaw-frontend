<x-app-layout>
  <x-slot name="header">
    <div class="flex">
      <div class="grow">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Threads') }}
        </h2>
      </div>
      <div class="flex-none">
        <x-nav-link :href="route('threads.create')">
          {{ __('New Thread') }}
        </x-nav-link>
      </div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm">
        <div class="bg-white border-b border-gray-200">
          
          <div class="bg-white shadow-sm divide-y">
            <table class="table-auto w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-2 py-2 text-base text-center text-gray-500"><input type="checkbox" /></th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Title</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Author</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Created</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($threads as $thread)
                  <tr>
                    <td class="px-2 py-2 text-sm text-center"><input type="checkbox"></td>
                    <td class="px-2 py-2 text-sm text-left"><a class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out" href="{{ route('threads.show', ["thread" => $thread->id]) }}">{{ $thread->title }}</a></td>
                    <td class="px-2 py-2 text-sm text-left">{{ $thread->user->name }}</td>
                    <td class="px-2 py-2 text-sm text-left">{{ $thread->created_at->format('j M Y, g:i a') }}</td>
                    <td class="px-2 py-2 text-sm text-left">
                      :
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</x-app-layout>