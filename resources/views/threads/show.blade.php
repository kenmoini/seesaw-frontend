<x-app-layout>
  <x-slot name="header">
    <div class="flex">
      <div class="grow">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-1">
          {{ __('Thread: ') }}{{ $thread->title }}
        </h2>
      </div>
      <div class="flex-none">
        <div class="hidden sm:flex sm:items-center sm:ml-6 pt-2">
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
      </div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm">
        <div class="bg-white border-b border-gray-200">
          
          <div class="bg-white shadow-sm divide-y py-0 divide-y">
            <div>
              @if($thread->ended_at)
              <x-header-image swatch="disco" title="{{ $thread->title }}" description="Posted by {{ $thread->user->name }} - Created {{ $thread->created_at->format('j M Y, g:i a') }} - Ended {{ $thread->ended_at->format('j M Y, g:i a') }}" />
              @else
              <x-header-image swatch="disco" title="{{ $thread->title }}" description="Posted by {{ $thread->user->name }} - Created {{ $thread->created_at->format('j M Y, g:i a') }}" />
              @endif
            </div>
            <div id="post-timeline">
              <div class="container mx-auto w-full h-full">
                <div class="relative wrap overflow-hidden p-10 h-full">
                  <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 25%"></div>

                  @foreach($thread->posts as $post)
                  @php
                  $insertEnded = false;
                  if ($thread->ended_at) {
                    $endedAfterThisPost = false;
                    $endedBeforeNextPost = true;
                    $nextItem = $loop->index + 1;

                    // TIMESTAMP = 1970-01-01 00:00:01
                    $threadEndedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $thread->ended_at);
                    $postDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at);

                    if ($threadEndedDate->gte($postDate)) {
                      $endedAfterThisPost = true;
                    }

                    // Check to see if it is greater than the next post
                    if ($thread->posts->count() > $nextItem) {
                      $nextPostDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $thread->posts[$nextItem]->created_at);
                      if ($threadEndedDate->gte($nextPostDate)) {
                        $endedBeforeNextPost = false;
                      }
                    }

                    if ($endedAfterThisPost && $endedBeforeNextPost) {
                      $insertEnded = true;
                    }

                  }
                  @endphp

                  <!-- timeline item #{{ $post->id }} -->
                  <div class="mt-4 mb-6 flex justify-between items-center w-full right-timeline">
                    <div class="order-1 w-3/12 text-right pr-3">
                      <div class="z-20 bg-gray-800 shadow-md float-right w-8 h-8 rounded-full relative left-2">
                        <h1 class="mx-auto text-white font-semibold text-lg text-center">&bull;</h1>
                      </div>
                      <div class="float-right mr-2">
                        <p>{{ ucfirst($post->type) }}</p>
                        <p class="text-xs text-gray-500 font-normal leading-none">{{ $post->created_at->format('j M Y, g:i a') }}</p>
                      </div>
                    </div>
                    <div class="order-1 bg-gray-100 shadow-md w-9/12 px-6 py-4">
                      @if(($thread->title != $post->title) && $post->title != "")<h3 class="mb-3 font-bold text-gray-800 text-xl">{{ $post->title }}</h3>@endif
                      <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">
                        {{ $post->body }}
                      </p>
                    </div>
                  </div>
                  <!-- end right timeline item #{{ $post->id }} -->
                  @if ($insertEnded)
                  <div class="mt-4 mb-6 flex justify-between items-center w-full right-timeline">
                    <div class="order-1 w-3/12 text-right pr-3">
                      <div class="z-20 bg-gray-800 shadow-md float-right w-8 h-8 rounded-full relative left-2">
                        <h1 class="mx-auto text-white font-semibold text-md leading-8 text-center"><i class="fas fa-lock"></i></h1>
                      </div>
                      <div class="float-right mr-2">
                        <p>Closed</p>
                        <p class="text-xs text-gray-500 font-normal leading-none">{{ $thread->ended_at->format('j M Y, g:i a') }}</p>
                      </div>
                    </div>
                    <div class="order-1 w-9/12 px-6 py-4">
                      <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">
                        The thread has been marked as closed
                      </p>
                    </div>
                  </div>
                  @endif
                  @endforeach

                </div>
              </div>
            </div>

            <div id="add-post">
              <div class="container mx-auto w-full h-full">
                
                <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    <h2 class="text-xl">Add a new Post</h2>
                    <hr class="mt-2 mb-3 py-2" />
                    <form method="POST" action="{{ route('threads.addPost', $thread->id) }}">
                        @csrf
                        <x-input-label for="title" value="Title (optional)" />
                        <x-text-input type="text" name="title" id="title" />

                        <x-input-label for="message" value="Message" />
                        <x-textarea-input name="message" id="message" />

                        <x-input-label for="visibility" value="Visibility" />
                        <select name="visibility" id="visibility" class="w-full border border-gray-300 rounded p-2 mb-4">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                            <option value="authenticated">Authenticated</option>
                        </select>

                        <x-input-label for="type" value="Type" />
                        <select name="type" id="type" class="w-full border border-gray-300 rounded p-2 mb-4">
                            <option value="informational">Informational</option>
                            <option value="identified">Identified</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="in-progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="resolved">Resolved</option>
                        </select>

                        @if(!$thread->ended_at)
                        <p class="my-2">
                          <label for="end_thread">
                            <input id="end_thread" name="end_thread" type="checkbox" />
                            <span>End Thread?</span>
                          </label>
                        </p>
                        @endif

                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('Add Post') }}</x-primary-button>

                    </form>
                </div>

              </div>
            </div>

          </div>
          
        </div>
      </div>
    </div>
  </div>
</x-app-layout>