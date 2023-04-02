<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Wish List') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <a href="products" class="p-2 bg-gray-800 m-2 text-white">Add Pets To Your Wish List</a>
        @foreach ($wish_lists as $wish_list)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{$wish_list->name}}
                </div>
            </div>
            <form method="POST" action="{{ route('remove-wishlist') }}">
                @csrf
                <div>
                    <input type="hidden" id="pet_id" name="pet_id" value="{{$wish_list->pet_id}}">
                </div>
                <button type="submit" class="m-2 p-2 bg-gray-800 border-2 border-black text-white">Remove From Wish List</button>
            </form>
        </div>
        @endforeach
    </div>
</x-appz-layout>
