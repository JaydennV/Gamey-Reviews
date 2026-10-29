<x-layout name="Home">
    <nav
        class=" flex w-full items-center items-center justify-between bg-[#9a8c98] px-6 py-14 h-20 border-b border-[#4a4e69]">

        <div class="flex items-center justify-center gap-4">
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
    <main class="relative isolate min-h-screen overflow-hidden">
        <div
            aria-hidden="true"
            class="pointer-events-none absolute inset-0 -z-10 scale-105 bg-cover bg-center bg-no-repeat blur-sm"
            style="background-image: url('{{ asset('images/backgroundimgheader.png') }}')"
        ></div>
        <div class="animate-appear flex flex-col gap-10 p-6 px-14 mt-8 justify-start text-xl">
            <h1 class="text-4xl font-caveat w-90 font-bold">Giving you the best
                <br>
                game reviewing experience.</h1>
            <p class="text-2xl w-92 pb-3">Gamey was created to provide users with an unique game reviewing experience.
                <br>
                We ensure security, smoothness, and enjoyability.
                <br>
                Interact with other users, connect, and share.</p>
            <a href="{{route('about')}}"
               class="inline-block w-40 rounded-md bg-[#4a4e69] px-6 py-3 text-white hover:bg-[#3a3e59]">
                Learn more!
            </a>
            <div class="flex gap-5 justify-center items-center">

            </div>
        </div>
        <div class="mx-auto grid max-w-6xl grid-cols-1 gap-12 px-8 py-10 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($reviews->take(3) as $review)
                <div class="animate-goUp">
                    <article
                        class="mb-8 flex flex-col gap-10 aspect-square overflow-hidden rounded-2xl border-2 border-[#4a4e69] bg-[#f2e9e4] p-6 shadow-[0_8px_0_#4a4e69,0_14px_24px_rgba(34,34,59,0.18)]  transition-transform duration-200 hover:-translate-y-2 hover:rotate-1 hover:shadow-[0_12px_0_#4a4e69,0_20px_30px_rgba(34,34,59,0.24)]">
                        <h2 class="mb-4 text-xl font-bold">"{{ $review->title }}"</h2>
                        <p class="overflow-hidden text-base leading-relaxed">{{ $review->text }}</p>
                        <div class="flex flex-col  ">
                            <p class="text-sm text-gray-500">by {{ $review->username }}</p>
                            <p class="text-sm text-gray-500">for {{ $review->game_name }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </main>
    @include('partials.footer')

</x-layout>
