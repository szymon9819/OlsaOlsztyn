<?php

namespace App\Models\Pivots;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LeaguesHasSeasons extends Pivot
{
    protected $table = 'league_has_seasons';
}
