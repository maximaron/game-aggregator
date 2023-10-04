<div class="relative">
    <input
        wire:model.live.debounce.300ms="search"
        type="text"
        class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 py-1"
        placeholder="Search..."
    >
    <div class="absolute top-0">
    </div>

    <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2">
        <ul>
            @foreach($searchResults as $game)
                <li class="border-b border-gray-700">
                    <a href="{{route('games.show',$game['slug'])}}" class="block hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-3 py-3">
                        @if(isset($game['cover']['url']))
                            <img src="{{Str::replaceFirst('thumb','cover_small',$game['cover']['url'])}}" alt="cover" class="w-10">
                        @else
                            <img src="/default.jpeg" alt="cover" class="w-10">
                        @endif
                        <span class="ml-4">{{$game['name']}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
