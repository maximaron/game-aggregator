<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated(){
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(11)->timestamp;

        $this->mostAnticipated = HTTP::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, rating,summary;
     sort rating desc;
     where platforms = (48,49,130,6) & (first_release_date >= {$current} & first_release_date < {$afterFourMonths} & rating > 75);
     limit 12;"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }
    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
