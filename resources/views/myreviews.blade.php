<x-layout name="My reviews">
    <nav class="flex w-full items-center justify-between bg-[#9a8c98] px-6 py-14 h-20 border-b border-[#4a4e69]">

        <div class="flex items-center gap-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <img
                    src="/images/logo.png"
                    alt="Logo"
                    class="h-12 w-auto hover:scale-110 transition-transform duration-200"
                >
            </a>
            @include('partials.navicon')
        </div>

        <div class="flex items-center gap-8 text-2xl">
            <x-navlink href="{{ route('home') }}">Home</x-navlink>
            <x-navlink href="{{ route('reviews') }}">Reviews</x-navlink>
            <x-navlink href="{{ route('reviews.user') }}">My Reviews</x-navlink>
            <x-navlink href="{{ route('about') }}">About</x-navlink>
            @if($isAdmin)
                <x-navlink href="{{ route('admin') }}">Dashboard</x-navlink>
            @endif
        </div>
    </nav>
    <div class="pt-5 text-xl flex gap-3 px-6 justify-start">
        <a href="{{ route('reviews.create') }}" class="bg-[#9a8c98] hover:bg-[#8a7c88] text-white py-2 px-4 rounded-lg">Create
            Review</a>
    </div>
    <main
        class=" mx-auto grid max-w-7xl grid-cols-1 gap-6 px-6 py-10 sm:grid-cols-3 lg:grid-cols-3">


        @foreach ($reviews as $review)
            <article
                class="animate-appear transition-appear  flex flex-col gap-4 overflow-hidden rounded-2xl border-2 border-[#4a4e69] bg-[#f2e9e4] p-7 shadow-[0_8px_0_#4a4e69,0_14px_24px_rgba(34,34,59,0.18)] transition-transform duration-200">
                <div class="flex gap-3">
                    <img class="w-auto h-9" src="/images/profileicon.png" alt="Picture of an anonymous profile icon">
                    <p class="text-xl text-base font-semibold text-[#4a4e69]">{{ $review->username }}
                    </p>


                </div>

                <h2 class="text-2xl font-bold">"{{ $review->title }}"</h2>
                <div class="mt-auto">

                    <p class="text-xl font-semibold text-gray-500"> {{ $review->game_name }}</p>
                </div>
                <div class="flex gap-4">
                    <x-navlink
                        class="text-[#4a4e69] border-2 border-[#4a4e69] p-3 hover:bg-[#4a4e69] hover:text-white transition-colors duration-300"
                        href="{{ route('reviews.edit', $review->id) }}">Edit review
                    </x-navlink>
                    <form action="{{ route('reviews.delete', $review->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="text-[#4a4e69] border-2 border-[#4a4e69] p-3 hover:bg-[#4a4e69] hover:text-white transition-colors duration-300"
                        >Delete review
                        </button>
                    </form>
                </div>


            </article>
        @endforeach

    </main>
    @include('partials.footer')
</x-layout>
