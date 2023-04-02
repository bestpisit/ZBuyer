<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{'Orders ID => '}}{{$order_id}}
        </h2>
        <a href="orders">BACK</a>
    </x-slot>
    @foreach ($order_items as $order_item)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white flex dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $order_item->name }}
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{"Price: "}}
                        {{ $order_item->price }}
                    </div>
                    @if ($purchased == false)
                    <form method="POST" action="{{ route('remove-order-item') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="order_item_id" name="order_item_id" value="{{$order_item->order_item_id}}">
                            <input type="hidden" id="order_id" name="order_id" value="{{$order_item->order_id}}">
                        </div>
                        <button type="submit" class="m-2 p-2 bg-yellow-400 border-2 border-black">Remove</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <div>
        @if ($purchased == false)
        <form method="POST" action="{{ route('purchase-order') }}">
            @csrf
            <div>
                <input type="hidden" id="order_id" name="order_id" value="{{$order_id}}">
            </div>
            <button type="submit" class="m-2 p-2 bg-yellow-400 border-2 border-black">Purchase Order {{"#"}} {{$order_id}}</button>
        </form>
        @endif
        @if ($purchased == true)
        {{"Total Prices: "}}{{$price}}
        @endif
    </div>
</x-appz-layout>
