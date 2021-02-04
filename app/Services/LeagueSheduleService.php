<?php

namespace App\Services;

use App\Models\Match;
use Carbon\Carbon;
use ScheduleBuilder;

class LeagueSheduleService
{

    public function generateSchedule($teams, $season, $date, $time)
    {
        $rounds = (($count = count($teams)) % 2 === 0 ? $count - 1 : $count) * 2;
        $scheduleBuilder = new ScheduleBuilder($teams, $rounds);
        $schedule = $scheduleBuilder->build()->full();
        $date= Carbon::createFromFormat('m/d/Y',$date);

        //single queue is played one the same day
        foreach ($schedule as $queue) {
            $tmpTime = Carbon::createFromFormat('H',$time);

            foreach ($queue as $singleMatch) {
                $match = new Match();
                $match->match_day = $date->format('Y-m-d');
                $match->time = $tmpTime;
                $match->home_id = $singleMatch[0]['id'];
                $match->guest_id = $singleMatch[1]['id'];
                $match->season_id = $season->id;
                $match->save();

                $tmpTime->modify('+1 hour');
            }
            $date->modify('+1 week');
        }
        return $schedule;
    }
}
