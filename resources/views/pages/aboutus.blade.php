<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray-100 font-semibold text-xl text-black leading-tight border-l-8 border-[#517851] pl-3">
            {{ __('What is about our website.') }}
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a class=" pl-5 text-lg">Welcome to our online pet store, where we offer a wide variety of animals from reputable breeders, including dogs,</a>
                <a class="text-lg"> cats, birds, reptiles, and small animals. We also carry a full range of supplies to keep your pet healthy and happy, from nutritious food to comfortable bedding and toys. Our knowledgeable staff is always ready to help you find the perfect pet and provide you with the resources you need for their care and wellbeing. </a>
                <img src="/img/petbg.jpg" alt="cart" class=" object-contain rounded-xl w-full pt-2">
                </div>
            </div>
        </div>
    </div>
</x-appz-layout>
