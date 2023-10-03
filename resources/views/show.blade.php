@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.css">
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>

    @php
        if (isset($game['cover']['url'])) {
            $imagePath =($game['cover']['url']);
        } else {
            $imagePath = '/default.jpeg';
        }
    @endphp
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{$game['coverImageUrl']}}" alt="cove">
            </div>
            <div class=" lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text=4xl leading-tight mt-2">{{$game['name']}}</h2>
                  <div class="text-gray-400">
                      @if($game['genres'])
                        <span>
                                    {{$game['genres']}}
                        </span>
                      @endif
                        &middot;
                        <span>{{$game['involvedCompanies']}}</span>
                        &middot;
                        <span>
                            {{$game['platforms']}}
                        </span>
                    </div>
                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                            <div id="progressBar" class="h-full"></div>
                        </div>
                        <div class="ml-4 text-xs">Member <br> Score</div>
                    </div>
                        @include('_rating',[
                            'slug' => 'progressBar',
                            'rating' => $game['rating'],
                            'event' => null,
                        ])
                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">
                        @if($game['social']['website'])
                           <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                               <a href="{{$game['social']['website']['url']}}" class="hover:text-gray-400">
                                   <img src="/planet.svg" alt="planet" class="w-8 h-5 fill-current">
                               </a>
                           </div>
                        @endif
                        @if($game['social']['instagram'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{$game['social']['instagram']['url']}}" class="hover:text-gray-400">
                                    <img src="/insta.svg" alt="insta" class="w-8 h-5 fill-current">
                                </a>
                            </div>
                            @endif
                            @if($game['social']['twitter'])
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a href="{{$game['social']['twitter']['url']}}" class="hover:text-gray-400">
                                        <img src="/twit.svg" alt="twit" class="w-8 h-5 fill-current">
                                    </a>
                                </div>
                            @endif
                            @if($game['social']['facebook'])
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a href="" class="hover:text-gray-400">
                                        <img src="/fb.svg" alt="planet" class="w-8 h-5 fill-current">
                                    </a>
                                </div>
                            @endif
                    </div>
                </div>
                <p class="mt-12">
                    {{$game['summary']}}
                </p>
                <div class="mt-12">
{{--                    <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">--}}
{{--                        <span class="ml-2"> Play Trailer</span>--}}
{{--                    </button> --}}
                    <a href="{{$game['trailer']}}" class="inline-flex flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span class="ml-2"> Play Trailer</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                images
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach($game['screenshots'] as $screenshot)
                <div>
                    <a href="{{ Str::replaceFirst('thumb','screenshot_huge',$screenshot['url']) }}">
                        <img src="{{ Str::replaceFirst('thumb','screenshot_big',$screenshot['url']) }}" alt="cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="similar-games-container  mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Similar Games
            </h2>

            <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach($game['similar_games'] as $game)
                    <div class="game-mt-8">
                        <div class="relative inline-block">
                            <a href="#">
                                <img alt="cover"  src="/default.jpeg">
                            </a>
                            @if(isset($game['rating']))
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                                    <div id="{{ $game['slug'] }}" class="font-semibold text-xs flex justify-center items-center h-full">
                                    </div>
                                </div>
                                @include('_rating',[
                                    'slug' => $game['slug'],
                                    'rating' => $game['rating'],
                                    'event' => null,
                                ])
                            @endif
                        </div>
                        <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                            {{$game['name']}}
                            <div class="text-gray-400 mt-1">
                                @foreach($game['platforms'] as $platform)
                                    @if(array_key_exists('abbreviation',$platform))
                                        {{$platform['abbreviation']}},
                                    @endif
                                @endforeach
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
