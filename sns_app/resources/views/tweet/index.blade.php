<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('unko') }}
            </h2>
            <button class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><a
                    href="{{ route('tweets.create') }}">
                    作るよ
                </a>
            </button>
        </div>
    </x-slot>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($tweets as $tweet)

        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            {{-- <span>投稿No.{{ $loop->index }}</span> --}}
                            {{ $tweet->text }}
                        </div>
                        <a href="{{ route('tweets.show', ['tweet' => $tweet->id ]) }}">{{ $tweet->id }}
                        </a>

                    </div>


                </div>
            </div>
        </div>
    @endforeach


</x-app-layout>
