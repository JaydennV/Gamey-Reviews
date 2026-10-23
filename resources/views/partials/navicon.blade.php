<div class="flex items-center px-4  gap-4 whitespace-nowrap text-2xl text-[#4a4e69]">
    @if($isAdmin)
        <p class="text-xl underline text-[#4a4e69]">{{ auth()->user()->name }} | Admin</p>
    @elseif(auth()->check())
        <p class="text-xl underline text-[#4a4e69]">{{ auth()->user()->name }}</p>
    @else
        <div class="flex px-4 text-xl items-center gap-8">
            <x-navlink href="{{ route('login') }}">Login</x-navlink>
            <x-navlink href="{{ route('register') }}">Register</x-navlink>
        </div>
    @endif
</div>
