<div>
    <div wire:init="loadPopularGames" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
        @forelse($popularGames as $game)
            @php
                if (isset($game['cover']['url'])) {
                    $imagePath = ($game['cover']['url']);
                } else {
                    $imagePath = '/default.jpeg';
                }
            @endphp
            <div class="game-mt-8" data-game-slug="{{ $game['slug'] }}">
                <div class="relative inline-block">
                    <a href="{{ route('games.show', $game['slug']) }}">
                        <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                        <div id="progress-container" class="font-semibold text-xs flex justify-center items-center h-full">
                                @include('_rating', [
                                    'slug' => $game['slug'],
                                    'rating' => $game['rating'],
                                    'event' => null,
                                ])
                        </div>
                    </div>
                </div>
                <a href="{{ route('games.show', $game['slug']) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                    {{ $game['name'] }}
                </a>
                <div class="text-gray-400 mt-1">
                    {{$game['platforms']}}
                </div>
                <!-- Добавление анимированного круга ProgressBar.js -->
                <div id="progressBar{{$loop->index}}" class="progress-bar"></div>
            </div>
        @empty
            @foreach(range(1,12) as $game)
                <div class="game-mt-8">
                    <div class="bg-gray-800 w-46 h-56"> </div>
                    <div class="block text-transparent text-lg bg-gray-700  leading-tight mt-1 rounded">
                        title goes here
                    </div>
                    <div class="text-transparent bg-gray-700 rounded mt-2 inline-block">
                        Platform goes here
                    </div>
                    <!-- Добавление анимированного круга ProgressBar.js для пустых элементов -->
                    <div id="progressBar{{$loop->index}}" class="progress-bar"></div>
                </div>
            @endforeach
        @endforelse
    </div>
    @include('_rating', [
        'event' => 'gameWithRatingAdded'
    ])
</div>

{{--// document.addEventListener('livewire:initialized', () => {--}}
{{--// @this.on('gameWithRatingAdded', params => {--}}
{{--//     console.log(params['0']['rating'])--}}
{{--//     const rating = params['0']['rating'];--}}
{{--//--}}
{{--//     const progressBarId = `progressBar${params['0']['index']}`;--}}
{{--//     const bar = new ProgressBar.Circle(document.getElementById(progressBarId), {--}}
{{--//         color: 'white',--}}
{{--//         strokeWidth: 6,--}}
{{--//         trailWidth: 4,--}}
{{--//         trailColor: '#4B5563',--}}
{{--//         easing: 'easeInOut',--}}
{{--//         duration: 2500,--}}
{{--//         text: {--}}
{{--//             autoStyleContainer: false--}}
{{--//         },--}}
{{--//         from: {color: '#48BB78', width: 6},--}}
{{--//         to: {color: '#48BB78', width: 6},--}}
{{--//         step: function (state, circle) {--}}
{{--//             circle.path.setAttribute('stroke', state.color);--}}
{{--//             circle.path.setAttribute('stroke-width', state.width);--}}
{{--//--}}
{{--//             var value = Math.round(circle.value() * 100);--}}
{{--//             if (value === 0) {--}}
{{--//                 circle.setText('0%');--}}
{{--//             } else {--}}
{{--//                 circle.setText(value + '%');--}}
{{--//             }--}}
{{--//         }--}}
{{--//     });--}}
{{--//     bar.animate(rating / 100);--}}
{{--// });--}}
{{--// });--}}
