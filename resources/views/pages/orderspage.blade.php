<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white dark:text-gray-200 leading-tight  border-l-8 border-[#517851] pl-3">
            {{ __('Your Orders') }}
           
        </h2>
    
    </x-slot>
    @foreach ($orders as $order)
        <div class="py-2"> 
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" text-white rounded w-24 pl-2 bg-gray-800 border-x-2 border-t-2 border-white">Order NO.
            </div>
                @if ($order->purchased == false)
                <div class="bg-white flex dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-2">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $order->order_id }}
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $order->description }}
                    </div>
                    @if ($order->purchased == false)
                    <form method="POST" action="{{ route('get-order') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="order_id" name="order_id" value="{{$order->order_id}}">
                        </div>
                        <button type="submit" class="mt-3 ml-3 p-2 bg-yellow-400 border-2 border-black hover:text-white

                        ">Review This Cart</button>
                    </form>
                    @endif
                    @if ($order->purchased == true)
                    <form method="POST" action="{{ route('get-order') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="order_id" name="order_id" value="{{$order->order_id}}">
                        </div>
                        <div>
                        <button type="submit" class=" p-2 text-white bg-yellow-400 border-2 border-black flex justify-center items-center
                        hover:border-white
                         ">Review A Summary</button>
                        </div>
                    </form>
                    @endif
                </div>
                @endif
                @if ($order->purchased == true)
                <div class="bg-gray-800 flex overflow-hidden shadow-sm sm:rounded text-white border-2">
                    <div class="p-6 text-white dark:text-gray-100">
                        {{ $order->order_id }}
                    </div>
                    <div class="p-6 text-white dark:text-gray-100">
                        {{ $order->description }}
                    </div>
                    @if ($order->purchased == false)
                    <form method="POST" action="{{ route('get-order') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="order_id" name="order_id" value="{{$order->order_id}}">
                        </div>
                        <button type="submit" class="mt-3 p-2 bg-yellow-400 border-2 border-black">Review This Cart</button>
                    </form>
                    @endif
                    @if ($order->purchased == true)
                    <form method="POST" action="{{ route('get-order') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="order_id" name="order_id" value="{{$order->order_id}}">
                        </div class=" flex justify-center items-center">
                        <div class="flex justify-center items-center">
                        <button type="submit" class="mt-3 text-white p-2 bg-yellow-400 border-2 border-black  hover:border-white
                        hover:text-red-400
                        ">Review A Summary</button>
                        </div>
                    </form>
                    @endif
                </div>
                @endif
            </div>
        </div>
    @endforeach
</x-appz-layout>
