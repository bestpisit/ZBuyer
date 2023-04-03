<x-app-layout>
    <x-slot name="header">  
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight border-l-8 border-[#587498] pl-3">
            {{ __('Home page') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-opacity-60 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This is our EER diagram.") }}
                    
                    <img  class="flex justify-center items-center ml-64" width="650" height="600"  src="https://scontent.fcnx4-1.fna.fbcdn.net/v/t1.15752-9/337776754_1397919574373391_6744980875493799801_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeGRdfHv-9EesFfNj5XUPxO9nAJ2NOT_iWCcAnY05P-JYL6qmEn8sGSrfu4qRuTrj-5GzL1SmM4X51L5_Xyb9aKJ&_nc_ohc=U4wg3winsEUAX8GcN_6&_nc_ht=scontent.fcnx4-1.fna&oh=03_AdTGElXuxthr002GhVV9bjZVf2A-nDrGrv1S_97iPpczqg&oe=6451C105" alt="Girl in a jacket">

                </div>
            </div>
        </div>
    </div>
</x-appz-layout>