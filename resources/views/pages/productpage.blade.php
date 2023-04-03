<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Choose one you like!') }}
        </h2>
    </x-slot>
    @foreach ($products as $product)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $product->name }}
                    </div>
                    <div class="px-6 py-2 text-gray-600">
                        Price: {{ $product->price }}
                    </div>
                    <img src="{{ $product->description }}" width="200" height="200"/>
                    <button onclick=""></button>
                    <form method="POST" action="{{ route('create-order') }}" class="m-2">
                        @csrf
                        <div>
                            <input type="hidden" id="name" name="name" value="{{$product->pet_id}}">
                        </div>
                        <button type="submit" class="m-2 p-4 bg-gray-500 border-2 border-black text-white">Add To Cart</button>
                    </form>
                    <form method="POST" action="{{ route('add-wishlist') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="pet_id" name="pet_id" value="{{$product->pet_id}}">
                        </div>
                        <button type="submit" class="m-2 p-2 bg-gray-800 border-2 border-black text-white">Add To WishList</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-appz-layout>
