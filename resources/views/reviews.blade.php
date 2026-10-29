<x-layout class="min-h-screen bg-cover bg-center bg-no-repeat" name="Reviews"
          style="background-image: url('{{ asset('images/backgroundimgheader.png') }}')">
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
        <a class="bg-[#9a8c98] hover:bg-[#8a7c88] hover:scale-105 text-white py-2 px-4 rounded-lg"
           href="{{route('reviews')}}">All reviews</a>
        <a class="bg-[#9a8c98] hover:bg-[#8a7c88] hover:scale-105 text-white py-2 px-4 rounded-lg"
           href="{{route('reviews', ['genre' => 'RPG'])}}">RPG</a>
        <a class="bg-[#9a8c98] hover:bg-[#8a7c88] hover:scale-105 text-white py-2 px-4 rounded-lg"
           href="{{route('reviews', ['genre' => 'Adventure'])}}">Adventure</a>
        <a class="bg-[#9a8c98] hover:bg-[#8a7c88] hover:scale-105 text-white py-2 px-4 rounded-lg"
           href="{{route('reviews', ['genre' => 'Horror'])}}">Horror</a>
        <a class="bg-[#9a8c98] hover:bg-[#8a7c88] hover:scale-105 text-white py-2 px-4 rounded-lg"
           href="{{route('reviews', ['genre' => 'Action'])}}">Action</a>
        <a class="bg-[#9a8c98] hover:bg-[#8a7c88] hover:scale-105 text-white py-2 px-4 rounded-lg"
           href="{{route('reviews', ['genre' => 'Strategy'])}}">Strategy</a>
        <a class="bg-[#9a8c98] hover:bg-[#8a7c88] hover:scale-105 text-white py-2 px-4 rounded-lg"
           href="{{route('reviews', ['genre' => 'Racing'])}}">Racing</a>
        <form method="GET" action="{{ route('reviews') }}">
            @csrf
            @if(request('genre'))
                <input type="hidden" name="genre" value="{{request('genre')}}">
            @endif
            <input type="text" name="search" value="{{request('search')}}" required placeholder="Search reviews..."
                   class="bg-[#f2e9e4] text-[#4a4e69] placeholder:text-[#4a4e69] border border-[#4a4e69] rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-[#9a8c98] hover:bg-[#8a7c88] text-white py-2 px-4 rounded-lg">Search
            </button>
        </form>
    </div>
    @if(isset($errorMessage))
        <p class="text-xl font-bold text-center pt-8 text-red-500">{{ $errorMessage }}</p>
    @endif
    @if(isset($isEmpty))
        <p class="text-center font-bold pt-8 text-xl text-gray-500">{{ $isEmpty }}</p>
    @endif
    <main
        class=" mx-auto grid max-w-7xl grid-cols-1 gap-6 px-6 py-10 sm:grid-cols-3 lg:grid-cols-3">
        @foreach ($reviews as $review)
            <article
                class="animate-appear transition-appear  flex flex-col gap-4 overflow-hidden rounded-2xl border-2 border-[#4a4e69] bg-[#f2e9e4] p-7 shadow-[0_8px_0_#4a4e69,0_14px_24px_rgba(34,34,59,0.18)] transition-transform duration-200 hover:-translate-y-2 hover:rotate-1">
                <div class="flex gap-3">
                    <img class="w-auto h-9" src="/images/profileicon.png" alt="Picture of an anonymous profile icon">
                    <p class="text-xl text-base font-semibold text-[#4a4e69]">{{ $review->username }}
                    </p>


                </div>

                <h2 class="text-2xl font-bold">"{{ $review->title }}"</h2>
                <div class="mt-auto">

                    <p class="text-xl font-semibold text-gray-500"> {{ $review->game_name }}</p>
                </div>
                <x-navlink class="mt-2 w-1" href="{{ route('reviews.show', $review->id) }}">Read review
                </x-navlink>

            </article>
        @endforeach
    </main>
    @include('partials.footer')

</x-layout>
