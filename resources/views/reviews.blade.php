<x-layout name="Reviews">
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
    <main>
        @foreach ($reviews as $review)
            <article
                class="flex flex gap-5 w-30 h-30 aspect-square overflow-hidden rounded-2xl border-2 border-[#4a4e69] bg-[#f2e9e4] p-6 shadow-[0_8px_0_#4a4e69,0_14px_24px_rgba(34,34,59,0.18)] transition-transform duration-200 hover:-translate-y-2 hover:rotate-1 hover:shadow-[0_12px_0_#4a4e69,0_20px_30px_rgba(34,34,59,0.24)]">
                <h2 class="mb-4 text-xl font-bold">"{{ $review->title }}"</h2>
                <p class="overflow-hidden text-base leading-relaxed">{{ $review->text }}</p>
                <div class="flex flex-col  ">
                    <p class="text-sm text-gray-500">by {{ $review->username }}</p>
                    <p class="text-sm text-gray-500">for {{ $review->game_name }}</p>
                </div>
            </article>
        @endforeach
    </main>
</x-layout>
