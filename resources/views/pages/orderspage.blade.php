<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Orders') }}
        </h2>
    </x-slot>
    @foreach ($orders as $order)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            </div>
        </div>
    @endforeach
</x-appz-layout>
