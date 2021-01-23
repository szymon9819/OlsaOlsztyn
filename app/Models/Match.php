<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable=['match_day'];

    public function matchResult(){
        return $this->belongsTo(MatchResult::class);
    }

}
