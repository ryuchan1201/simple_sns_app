<x-app-layout>
    <x-slot name="header">
        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>
    <div>
    </div>
    <form action="{{ route('tweets.update', ['tweet' => $tweet->id]) }}" method="post">
        @csrf
        @method('put')
        <textarea cols="30" rows="4" name="text" class="text-black-200">
            {{ $tweet->text }}
        </textarea>
        <button type="submit"
            class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
            type="button">
            編集
        </button>
    </form>

    <form action="{{ route('tweets.destroy', ['tweet' => $tweet->id]) }}" method="post">

        @csrf
        @method('delete')
        <button type="submit"
            class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
            type="button">
            削除
    </form>
    </button>

</x-app-layout>
