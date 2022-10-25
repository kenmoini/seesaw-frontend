<x-app-layout>
  <x-slot name="header">
    <div class="flex">
      <div class="grow">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-2">
          {{ __('Threads') }}
        </h2>
      </div>
      <div class="flex-none">
        <x-nav-link :href="route('threads.create')" class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-5 py-2 pt-2 transition duration-500 ease select-none hover:bg-indigo-600 hover:text-white focus:outline-none focus:shadow-outline">
          <p class="pt-1">{{ __('New Thread') }}<span class="fas fa-plus ml-2"></p></span>
        </x-nav-link>
      </div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow-sm">
        <div class="bg-white border-b border-gray-200">
          
          <div class="bg-white shadow-sm divide-y">
            <table class="table-auto w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-2 py-2 text-base text-center text-gray-500"><input type="checkbox" /></th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Title</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Author</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Posts</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Visibility</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Created</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500">Ended</th>
                  <th class="px-2 py-2 text-base text-left text-gray-500"></th>
                </tr>
              </thead>
              <tbody>
                @if ($threads->count())
                  @foreach ($threads as $thread)
                    <tr>
                      <td class="px-2 py-2 text-sm text-center"><input type="checkbox"></td>
                      <td class="px-2 py-2 text-sm text-left"> 
                        <x-nav-link :href="route('threads.show', $thread)">
                          {{ $thread->title }}
                        </x-nav-link>
                      </td>
                      <td class="px-2 py-2 text-sm text-left">{{ $thread->user->name }}</td>
                      <td class="px-2 py-2 text-sm text-left">{{ $thread->posts->count() }}</td>
                      <td class="px-2 py-2 text-sm text-left">{{ ucfirst($thread->visibility) }}</td>
                      <td class="px-2 py-2 text-sm text-left">{{ $thread->created_at->format('j M Y, g:i a') }}</td>
                      <td class="px-2 py-2 text-sm text-left">{{ $thread->ended_at ? $thread->ended_at->format('j M Y, g:i a') : 'N/A' }}</td>
                      <td class="px-2 py-2 text-sm text-right">
                        <div class="hidden sm:flex sm:items-center sm:ml-6 text-right">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>Actions</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('threads.edit', $thread->id)">Edit</x-dropdown-link>
                                    <form method="POST" action="{{ route('threads.destroy', $thread) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('threads.destroy', $thread)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td class="px-2 py-2 text-base text-center text-gray-500" colspan="8">No threads found.</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</x-app-layout>