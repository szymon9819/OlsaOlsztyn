<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchResult extends Model
{
    protected $fillable=['home','guest', 'match_id'];

    public function match(){
        return $this->belongsTo(Match::class);
    }
}
