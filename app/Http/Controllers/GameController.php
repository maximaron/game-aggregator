<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $game = HTTP::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation,rating, slug,involved_companies.company.name,genres.name,aggregated_rating,summary,websites.*, videos.*,screenshots.*,similar_games.*,similar_games.name,similar_games.rating,similar_games.platforms.abbreviation,similar_games.slug ;
                where slug =\"{$slug}\";
                "
            )->post('https://api.igdb.com/v4/games')->json();
        abort_if(!$game, 404);
        return view('show', [
            'game' => $this->formatGameForView($game[0]),
        ]);
    }
    private function formatGameForView($game)
    {
        return collect($game)->merge([
            'coverImageUrl'=> Str::replaceFirst('thumb','cover_big',$game['cover']['url']),
            'genres' => collect($game['genres'])->pluck('name')->implode(', '),
            'involvedCompanies' => $game['involved_companies'][0]['company']['name'],
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            'trailer' => 'https://youtube.com/embed/'.$game['videos'][0]['video_id'],
            'social' => [
                'website' => collect($game['websites'])->first(),
                'facebook' => collect($game['websites'])->filter(function($website){
                return Str::contains($website['url'],'facebook');
                })->first(),
                'twitter' => collect($game['websites'])->filter(function($website){
                    return Str::contains($website['url'],'twitter');
                })->first(),
                'instagram' => collect($game['websites'])->filter(function($website){
                    return Str::contains($website['url'],'instagram');
                })->first(),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
