<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::user()->name }}のアプリ
            </h2>
            {{-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('tweets.create') }}">
                    作るよ
                </a>
            </button> --}}
        </div>
    </x-slot>

    @if ($errors->any())
    <div class="alert text-red-400">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="">
        <form method="post" action="{{route('tweets.store')}}" class="w-full max-w-lg">
        @csrf
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        tweet
                    </label>
                    <textarea
                        class=""
                        id="grid-first-name" name="text" type="text" placeholder="">
                    </textarea>
                    <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        toukou
      </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
