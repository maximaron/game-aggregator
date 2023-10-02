<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];
    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;


        $this->recentlyReviewed = HTTP::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating,summary;
     sort rating desc;
     where platforms = (48,49,130,6) & (first_release_date >= {$before} & first_release_date < {$current} & rating > 75);
     limit 12;"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
