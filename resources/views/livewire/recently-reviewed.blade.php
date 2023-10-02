<div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8" >
    @forelse($recentlyReviewed as $game)
        @php
            if (isset($game['cover']['url'])) {
                $imagePath =($game['cover']['url']);
            } else {
                $imagePath = '/default.jpeg';
            }
        @endphp
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="#">
                    <img src="{{Str::replaceFirst('thumb','cover_big',$imagePath)}}" alt="game cover" class=" w-48 hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right:-20px; bottom: -20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{round($game['rating'])}}%
                    </div>
                </div>
            </div>
            <div class="ml-12 lg-12">
                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                    {{ $game['name']}}</a>
                <div class="text-gray-400 mt-1">
                    @foreach($game['platforms'] as $platform)
                        @if(array_key_exists('abbreviation',$platform))
                            {{$platform['abbreviation']}},
                        @endif
                    @endforeach
                </div>
                <p class="mt-6 text-gray-400 hidden lg:block">
                    {{$game['summary']}}
                </p>
            </div>
        </div>
    @empty
        @foreach(range(1,3) as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
              <div class="bg-gray-700 w-32 lg:w-48 h-40 lg:h-56"></div>
            </div>
            <div class="ml-12 lg-12">
                <div class=" block text-lg font-semibold leading-tight text-transparent bg-gray-700 rounded  mt-4">
                    title goes here
                </div>
                <div class="text-transparent bg-gray-700 inline-block mt-1 rounded">
                    platform goes here
                </div>
                <p class="mt-6 text-transparent inline-block bg-gray-700 rounded hidden lg:block">
                    pellentesque cetero maiestatis repudiare iusto habitant varius lacus civibus utroque brute definitionem tamquam legere euripidis adolescens nisl saperet nulla euripidis adversarium varius rhoncus velit solet doming elaboraret aliquam sea impetus atomorum praesent persecuti nominavi nibh alterum cu commune felis liber dolorum libris intellegebat movet oratio cum lacus nec vim purus
                </p>
            </div>
        </div>
        @endforeach
    @endforelse
</div>
