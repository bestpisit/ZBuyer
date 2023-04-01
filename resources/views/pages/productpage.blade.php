<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Headder') }}
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
                        {{ $product->description }}
                    </div>
                    <button onclick=""></button>
                    <form method="POST" action="{{ route('create-order') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="name" name="name" value="{{$product->pet_id}}">
                        </div>
                        <button type="submit" class="m-2 p-2 bg-yellow-400 border-2 border-black">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-appz-layout>
