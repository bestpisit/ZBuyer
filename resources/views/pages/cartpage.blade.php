<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight flex cursor-default">
            {{'Orders ID  NO. '}}
            <div class="flex pl-1 font-semibold text-white hover:text-red-400 cursor-default">
            {{$order_id}}
            </div>
        </h2>
            <div class="text-white border-2 rounded pl-2 mt-1 w-16 bg-black border-black hover:border-white hover:font-semibold flex">
        <a class=" hover:font-semibold" href="orders">BACK</a>
            </div>

    </x-slot>
    @foreach ($order_items as $order_item)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white flex dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex">
                        <div class="font-semibold flex">
                        {{" Name : "}}
                        </div>
                        <div class="flex ml-2">
                        {{ $order_item->name }}
                        </div>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{"Price: "}}
                        {{ $order_item->price }} $
                    </div>
                    @if ($purchased == false)
                    <form method="POST" action="{{ route('remove-order-item') }}">
                        @csrf
                        <div>
                            <input type="hidden" id="order_item_id" name="order_item_id" value="{{$order_item->order_item_id}}">
                            <input type="hidden" id="order_id" name="order_id" value="{{$order_item->order_id}}">
                        </div>
                        <button type="submit" class="m-3 p-2 bg-yellow-400 border-2 border-black">Remove</button>
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
            <button type="submit" class="m-2 p-2 bg-yellow-400 border-2 border-black rounded-xl ml-28">Purchase Order {{"#"}} {{$order_id}}</button>
        </form>
        @endif
        @if ($purchased == true)
    <div class="font-semibold flex justify-center text-xl border-4 border-[#587058] rounded-xl bg-[#FFD800] p-1  w-30 items-center">
        {{"Total Prices: "}}{{$price}}{{" $"}}
    </div>
        @endif
    </div>
</x-appz-layout>
