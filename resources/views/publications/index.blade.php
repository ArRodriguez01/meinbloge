<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($posts as $post)
            @if ($post->user->is(auth()->user()))
            <div class="p-6 flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-500">{{$post->user->name}}</span>
                            <span class="ml-2 text-sm text-gray-400">{{$post->created_at->format('j M Y, g:i a')}}</span>
                            @unless ($post->created_at->eq($post->updated_at))
                                <small class="text-sm text-gray-600">&middot;{{ __('edited')}}</small>
                            @endunless
                        </div>

                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                          </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link href="{{route('posts.edit',$post)}}">
                                        {{ __('Edit')}}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('posts.destroy',$post)}}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link href="{{route('posts.destroy',$post)}}" onclick="event.preventDefault();this.closest('form').submit();">
                                            {{ __('Borrar')}}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>

                    </div>

                   <p class="mt-2 text-lg text-gray-900"> {{$post->message}}</p>

                   <form method="POST" action="{{route('comment',$post)}}">
                    @csrf


                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    <br>
                    <br>
                    @foreach ($comments as $comment)
                    @if ($post->id==$comment->post_id)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                      </svg>
                    <span class="text-gray-500">{{$post->user->name}}</span>
                    <span class="ml-2 text-sm text-gray-400">{{$comment->created_at->format('j M Y, g:i a')}}</span>
                    <p class="mt-2 text-lg text-gray-900"> {{$comment->message}}</p>

                    @endif
                    @endforeach
                </form>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
