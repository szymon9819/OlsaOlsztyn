<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $fillable = ['adress', 'league_id'];
    protected $table = 'stadiums';

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function matches()
    {
        return $this->hasMany(Match::class);
    }


    public static function emptyLeague()
    {
        $stadiums = Stadium::where('league_id', null)->get();

        return $stadiums;
    }

//    return stadiums which are free or belongsTo specifyied league
    public static function emptyAndWithLeague($league)
    {
        $stadiums = Stadium::WhereIn('league_id', array_column($league->stadiums->toArray(), 'league_id'))->orWhere('league_id', null)->get();
        return $stadiums;
    }

    public static function updateLeagueAssociation($requestIds, $league)
    {
        $stadiums = Stadium::emptyAndWithLeague($league);
//      delete exciting associations
        foreach($stadiums as $std)
            $std->league_id=null;
//      create new associations
        foreach ($stadiums as $stadium) {
            foreach ($requestIds as $id) {
                if ($stadium->id == $id)
                    $stadium->league_id = $league->id;
            }
            $stadium->save();
        }

    }

    public static function addLeagueAssociation($requestIds, $league)
    {
        $stadiums = Stadium::emptyLeague($league);
        foreach ($stadiums as $stadium)
            foreach ($requestIds as $id) {
                if ($stadium->id == $id)
                    $stadium->league_id = $league->id;
                $stadium->save();
            }
        return $stadiums;
    }
}
