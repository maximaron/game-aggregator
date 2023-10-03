@extends('layouts.app')

@section('content')
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
                <img src="{{Str::replaceFirst('thumb','cover_big',$imagePath)}}" alt="cove">
            </div>
            <div class=" lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text=4xl leading-tight mt-2">{{$game['name']}}</h2>
                  <div class="text-gray-400">
                        <span>
                            @foreach($game['genres'] as $genre)
                                    {{$genre['name']}},
                            @endforeach
                        </span>
                        &middot;
                        <span>{{$game['involved_companies'][0]['company']['name']}}</span>
                        &middot;
                        <span>
                            @foreach($game['platforms'] as $platform)
                                @if(array_key_exists('abbreviation',$platform))
                                    {{$platform['abbreviation']}},
                                @endif
                            @endforeach
                        </span>
                    </div>
                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                @if(array_key_exists('rating',$game))
                                    {{round($game['rating']).'%' }}
                                @else
                                    0%
                                @endif
                            </div>
                        </div>
                    <div class="ml-4 text-xs">Member <br> Score</div>
                    </div>
                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">
                       <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                           <a href="" class="hover:text-gray-400">
                               <img src="/planet.svg" alt="planet" class="w-8 h-5 fill-current">
                           </a>
                       </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="" class="hover:text-gray-400">
                                <img src="/insta.svg" alt="planet" class="w-8 h-5 fill-current">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="" class="hover:text-gray-400">
                                <img src="/twit.svg" alt="planet" class="w-8 h-5 fill-current">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="" class="hover:text-gray-400">
                                <img src="/fb.svg" alt="planet" class="w-8 h-5 fill-current">
                            </a>
                        </div>
                    </div>
                </div>
                <p class="mt-12">
                    {{$game['summary']}}
                </p>
                <div class="mt-12">
{{--                    <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">--}}
{{--                        <span class="ml-2"> Play Trailer</span>--}}
{{--                    </button> --}}
                    <a href="https://youtube.com/watch/{{$game['videos'][0]['video_id']}}" class="inline-flex flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
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
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        {{round($game['rating']).'%'}}
                                    </div>
                                </div>
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
