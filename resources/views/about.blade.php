<x-layout name="About">
    <nav class="flex w-full items-center justify-between bg-[#9a8c98] px-6 py-14 h-20">
        <a href="{{ route('home') }}" class="flex items-center">
            <img
                src="/images/logo.png"
                alt="Logo"
                class="h-12 w-auto hover:scale-110 transition-transform duration-200"
            >
        </a>

        <div class="flex items-center gap-8 text-2xl">
            <x-navlink href="{{ route('home') }}">Home</x-navlink>
            <x-navlink href="{{ route('reviews') }}">Reviews</x-navlink>

            <x-navlink href="{{ route('about') }}">About</x-navlink>
        </div>
    </nav>
</x-layout>
