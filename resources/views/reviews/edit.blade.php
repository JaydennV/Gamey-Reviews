<x-layout name="Edit review">
    <nav class="flex w-full items-center justify-between bg-[#9a8c98] px-6 py-14 h-20">
        <a href="{{ route('home') }}" class="flex items-center">
            <img
                src="/images/logo.png"
                alt="Logo"
                class="h-12 w-auto hover:scale-110 transition-transform duration-200"
            >
        </a>

        <div class="flex items-center gap-8 text-2xl">

            <x-navlink href="{{ route('reviews.user') }}">Back</x-navlink>
        </div>
    </nav>
    <main class="w-full justify-center items-center flex flex-col gap-4">
        @include('partials.editform')
    </main>
    @include('partials.footer')
</x-layout>
