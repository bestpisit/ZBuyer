<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 dark:text-gray-200 leading-tight border-l-8 border-[#E86850] pl-3">
            {{ __('Choose one you like!') }}
        </h2>
    </x-slot>
    @foreach ($products as $product)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white bg-opacity-70 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-bold cursor-default">
                        <div class="bg-yellow-400 text-xl rounded w-20 pb- pl-3 mb-1 cursor-default">
                         Name 
                        </div>
                        <div class="text-xl pt-2">
                        {{ $product->name }}
                        </div>
                    </div>
                    <div class="px-6 py-1 text-black cursor-default">
                        <div class="bg-yellow-400 text-xl rounded w-16 pb-1 pl-3 mb-1 cursor-default">
                            URL 
                           </div>
                         {{ $product->description }}
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100 cursor-default ">
                        <div class="bg-red-400 rounded pl-3 py-1  w-36 text-white cursor-default mb-3">
                        Prices : {{ $product->price }} $
                    </div>
                    <img src="{{ $product->description }}" width="200" height="200"/>
                    <div>
                    <button onclick=""></button>
                    </div>
                    <form method="POST" action="{{ route('create-order') }}" class="m-2">
                        @csrf
                        <div>
                            <input type="hidden" id="name" name="name" value="{{$product->pet_id}}">
                        </div>
                        <button type="submit" class="m-2 p-2 bg-orange-500 border-2 border-white rounded-xl
                         hover:text-red-500 hover:font-semibold hover:border-red-400 hover:text-white mt-1
                        ">Add To Cart</button>
                    </form>
                    <form method="POST" action="{{ route('add-wishlist') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="pet_id" name="pet_id" value="{{$product->pet_id}}">
                        </div>
                        <button type="submit" class="m-2 p-2 bg-black border-2 border-black text-white
                         rounded-xl hover:border-white hover:font-semibold 
                        ">Add To WishList</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-appz-layout>
