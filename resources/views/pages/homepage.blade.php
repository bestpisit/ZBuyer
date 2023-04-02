<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Headder') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Home Page") }}
                    
                    <img src="https://scontent.fcnx4-1.fna.fbcdn.net/v/t1.15752-9/337776754_1397919574373391_6744980875493799801_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeGRdfHv-9EesFfNj5XUPxO9nAJ2NOT_iWCcAnY05P-JYL6qmEn8sGSrfu4qRuTrj-5GzL1SmM4X51L5_Xyb9aKJ&_nc_ohc=U4wg3winsEUAX8GcN_6&_nc_ht=scontent.fcnx4-1.fna&oh=03_AdS-EeFiPY40s4iWZSBZJnIeKnnZFGnsQYTzOC3zoutbTw&oe=64511845" alt="Italian Trulli">
            </div>
        </div>
    </div>
</x-appz-layout>
