<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 dark:text-gray-200 leading-tight  border-l-8 border-[#517851] pl-3">
            {{ __('Your Orders') }}
        </h2>
    </x-slot>
    @foreach ($orders as $order)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if ($order->purchased == false)
                <div class="bg-white flex dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
                        <button type="submit" class="mx-auto p-2 bg-yellow-400 border-2 border-black">Review This Cart</button>
                    </form>
                    @endif
                    @if ($order->purchased == true)
                    <form method="POST" action="{{ route('get-order') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="order_id" name="order_id" value="{{$order->order_id}}">
                        </div>
                        <button type="submit" class="mx-auto p-2 bg-yellow-400 border-2 border-black">Review A Summary</button>
                    </form>
                    @endif
                </div>
                @endif
                @if ($order->purchased == true)
                <div class="bg-gray-800 flex overflow-hidden shadow-sm sm:rounded-lg text-white">
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
                        <button type="submit" class="mx-auto p-2 bg-yellow-400 border-2 border-black">Review This Cart</button>
                    </form>
                    @endif
                    @if ($order->purchased == true)
                    <form method="POST" action="{{ route('get-order') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="order_id" name="order_id" value="{{$order->order_id}}">
                        </div>
                        <button type="submit" class="mx-auto p-2 bg-yellow-400 border-2 border-black">Review A Summary</button>
                    </form>
                    @endif
                </div>
                @endif
            </div>
        </div>
    @endforeach
</x-appz-layout>
