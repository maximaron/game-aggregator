<div wire:init="loadMostAnticipated">
@forelse($mostAnticipated as $game)
    @php
        if (isset($game['cover']['url'])) {
            $imagePath =($game['cover']['url']);
        } else {
            $imagePath = '/default.jpeg';
        }
    @endphp
    <div class="most-antisipated-container space-y-10 mt-8">
        <div class="game flex">
            <a href="#">
                <img src="{{$imagePath}}" alt="game cover" class=" w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="#" class="hover:text-gray-300">{{$game['name']}}</a>
                <div class="text-gray-400 text-sm mt-1">{{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y')}}</div>
            </div>
        </div>
    </div>
    @empty
    <div>
        Loading...
    </div>
@endforelse
    </div>
