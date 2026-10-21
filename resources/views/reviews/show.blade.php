<x-layout name="{{ $clickedReview->title }}">
    <nav class="flex w-full items-center justify-between bg-[#9a8c98] px-6 py-14 h-20 border-b border-black">
        <a href="{{ route('home') }}" class="flex items-center">
            <img
                src="/images/logo.png"
                alt="Logo"
                class="h-12 w-auto hover:scale-110 transition-transform duration-200"
            >
        </a>

        <div class="flex items-center gap-8 text-2xl">
            <x-navlink href="{{ route('reviews') }}">Back</x-navlink>

        </div>
    </nav>
    <main class="flex justify-center align-middle items-center w-full">
        <article
            class="flex justify-center align-middle min-h-60 p-8 m-20 flex-col gap-2 overflow-hidden rounded-2xl border-2 border-[#4a4e69] bg-[#f2e9e4] p-8 shadow-[0_8px_0_#4a4e69,0_14px_24px_rgba(34,34,59,0.18)]">
            <h2 class="text-2xl font-bold">"{{ $clickedReview->title }}"</h2>

            <div class="pb-3 border-b border-[#4a4e69] flex gap-2">
                <img class="w-auto h-9" src="/images/profileicon.png" alt="Picture of an anonymous profile icon">
                <p class="text-xl text-base font-semibold text-[#4a4e69]">{{ $clickedReview->username }}
                    | {{$clickedReview->game_name}} | ${{$clickedReview->price}}</p>

            </div>

            <div class="mt-auto flex flex-col gap-7">

                <p class="text-2xl font-semibold text-[#4a4e69]"> {{ $clickedReview->text }}</p>
                <p class="bg-[#4a4e69] w-20 text-center text-white p-2 rounded-lg"> {{ $clickedReview->genre }}</p>


            </div>


        </article>


    </main>


</x-layout>
