<x-layout name="Dashboard">
    <nav class="flex w-full items-center justify-between bg-[#9a8c98] px-6 py-14 h-20 border-b border-[#4a4e69]">
        <div class="flex items-center gap-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <img
                    src="/images/logo.png"
                    alt="Logo"
                    class="h-12 w-auto hover:scale-110 transition-transform duration-200"
                >
            </a>
        </div>

        <div class="flex items-center gap-8 text-2xl">
            <x-navlink href="{{ route('home') }}">Back</x-navlink>

        </div>
    </nav>
    <main class="flex flex-col ">

        <div class="mx-auto w-full max-w-7xl overflow-x-auto px-4 py-8">
            <table class="w-full min-w-[900px] table-fixed text-left text-lg">
                <thead>
                <tr class="border-b-2 border-[#4a4e69] text-[#4a4e69]">
                    <th class="w-16 px-3 py-3">ID</th>
                    <th class="w-40 px-3 py-3">User</th>
                    <th class="w-44 px-3 py-3">Game</th>
                    <th class="w-48 px-3 py-3">Title</th>
                    <th class="px-3 py-3">Review</th>
                    <th class="w-28 px-3 py-3">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($reviews as $review)
                    <tr class="border-b border-[#4a4e69] align-top">
                        <td class="px-3 py-4">{{ $review->id }}</td>
                        <td class="break-words px-3 py-4 font-semibold">{{ $review->username }}</td>
                        <td class="break-words px-3 py-4">{{ $review->game_name }}</td>
                        <td class="break-words px-3 py-4">{{ $review->title }}</td>
                        <td class="break-words px-3 py-4">{{ $review->text }}</td>
                        <td class="px-3 py-4">
                            <form action="{{ route('reviews.admindelete', $review->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="rounded bg-red-800 px-3 py-2 text-white hover:bg-red-900"
                                >
                                    Delete
                                </button>
                            </form>

                        </td>
                        <td class="px-3 py-4">
                            <form action="{{ route('reviews.status', $review->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <label class="switch">
                                    <input
                                        type="checkbox"
                                        name="is_active"
                                        value="1"
                                        @checked($review->is_active ?? true)                                        onchange="this.form.submit()"
                                    >
                                    <span class="slider"></span>
                                    <span class="status">
            <span class="active">Active</span>
            <span class="inactive">Hidden</span>
        </span>
                                </label>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>


</x-layout>
