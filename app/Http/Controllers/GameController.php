<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(11)->timestamp;



        $popularGames = HTTP::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating;
     sort rating desc;
     where platforms = (48,49,130,6) & (first_release_date >= {$before} & first_release_date < {$after} & rating > 40);
     limit 12;"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();

        //recently reviewed

        $recentlyReviewed = HTTP::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating,summary;
     sort rating desc;
     where platforms = (48,49,130,6) & (first_release_date >= {$before} & first_release_date < {$current} & rating > 75);
     limit 12;"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();

        //most anticipated
        $mostAnticipated = HTTP::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating,summary;
     sort rating desc;
     where platforms = (48,49,130,6) & (first_release_date >= {$current} & first_release_date < {$afterFourMonths} & rating > 75);
     limit 12;"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
        return view('index', [
            'popularGames' => $popularGames,
            'recentlyReviewed' => $recentlyReviewed,
            'mostAnticipated' => $mostAnticipated
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
    public function show(string $id)
    {
        //
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
