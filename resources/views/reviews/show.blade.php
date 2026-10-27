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
    <main class="flex flex-col justify-center align-middle items-center w-full">
        <article
            class="flex justify-center align-middle min-h-60 p-8 m-20 flex-col gap-2 overflow-hidden rounded-2xl border-2 border-[#4a4e69] bg-[#f2e9e4] p-8 shadow-[0_8px_0_#4a4e69,0_14px_24px_rgba(34,34,59,0.18)]">
            <h2 class="text-2xl font-bold">"{{ $clickedReview->title }}"</h2>

            <div class="pb-3 border-b border-[#4a4e69] flex gap-2">
                <img class="w-auto h-9" src="/images/profileicon.png" alt="Picture of an anonymous profile icon">
                <p class="text-xl text-base font-semibold text-[#4a4e69]">{{ $clickedReview->username }}
                    | {{$clickedReview->game_name}} | ${{$clickedReview->price}}</p>

            </div>

            <div class="mt-3 w-full pb-8 border-b border-[#4a4e69] mt-auto flex flex-col gap-7">

                <p class="text-2xl font-semibold text-[#4a4e69]"> {{ $clickedReview->text }}</p>
                <p class="bg-[#4a4e69] w-20 text-center text-white p-2 rounded-lg"> {{ $clickedReview->genre }}</p>


            </div>

            <div
                class="flex justify-start align-start min-h-60 p-8  flex-col gap-2  rounded-2xl bg-[#f2e9e4] p-8 ">
                <h3 class="text-2xl font-bold mb-4">Comments ({{$clickedReview->comments->count()}})</h3>
                @include('partials.commentform')
                <div class="space-y-4 mt-6">
                    @foreach ($clickedReview->comments as $comment)
                        <div class=" bg-[#4a4e69] p-3 flex flex-col gap-1 rounded-lg">
                            <p class="text-lg text-white">"{{ $comment->content }}"</p>
                            <p class="text-sm text-white"> {{ $comment->user->name }}</p>
                            <p class="text-xs text-gray-300">{{ $comment->created_at->format('M j, Y') }}</p>

                            @if(auth()->id() == $comment->user_id || $isAdmin )
                                <form method="POST"
                                      action="{{ route('comments.destroy', $comment->id) }}"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="h-8 mx-auto mt-3 rounded bg-red-800 px-2 py-1 text-white hover:bg-red-900"
                                        type="submit">Delete
                                    </button>
                                </form>
                            @endif


                        </div>
                    @endforeach


                </div>
            </div>
        </article>


    </main>


</x-layout>
