<form class="justify-center flex items-center pt-3 pb-0  flex-col" method="POST" name="commentForm"
      action="{{ route('comments.store') }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    <input type="hidden" name="review_id" value="{{ $clickedReview->id }}">
    <textarea
        class="h-12 w-80 border border-[#4a4e69] rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        name="comment_content" placeholder="Write a comment..." required></textarea>
    @error('comment_content')
    <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
    <button class="mt-8 bg-[#4a4e69] w-36 text-white py-2 px-2 rounded hover:bg-[#3a3d5c]" for="commentForm"
            type="submit">Post comment
    </button>
</form>
