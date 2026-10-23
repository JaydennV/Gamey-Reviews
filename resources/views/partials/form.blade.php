<form class="mx-auto flex min-h-[41rem] w-full max-w-3xl flex-col gap-2.5 border-2 border-[#4a4e69] p-8 m-3 sm:p-8"
      action="{{ route('reviews.store') }}"
      method="POST"
      name="create-review">
    @csrf

    <label for="title">Review title</label>
    <input class="w-full border-2 border-[#4a4e69] px-3 py-2" type="text" placeholder="Write a title for your review..."
           id="title" name="title" required>
    <label for="text">Text</label>
    <textarea class="w-full border-2 border-[#4a4e69] px-3 py-2" id="text" name="text"
              placeholder="Write your review here..." required></textarea>

    <label for="price">Price</label>
    <input class="w-full border-2 border-[#4a4e69] px-3 py-2" type="number" id="price" placeholder="Enter the price..."
           name="price" step="0.01" required>

    <label for="game_name">Game</label>
    <input class="w-full border-2 border-[#4a4e69] px-3 py-2" type="text" placeholder="Enter the game name..."
           id="game_name" name="game_name" required>

    <label for="genre">Genre</label>
    <input class="w-full border-2 border-[#4a4e69] px-3 py-2" type="text" placeholder="Enter the genre..." id="genre"
           name="genre" required>
    <div class="flex justify-center items-center">


        <button class="mt-8 bg-[#4a4e69] w-48 text-white py-2 px-4 rounded hover:bg-[#3a3d5c]" for="create-review"
                type="submit">
            Create Review
        </button>
    </div>
</form>
