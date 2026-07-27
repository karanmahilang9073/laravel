<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100">
                <div class="p-8 text-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Welcome back 👋
                    </h3>
                    <p>{{ __("You're logged in!") }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>