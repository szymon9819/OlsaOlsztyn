<?php


namespace App\Services;


use ScheduleBuilder;

class LeagueSheduleService
{

    public function generateSchedule($teams){
        $rounds = (($count = count($teams)) % 2 === 0 ? $count - 1 : $count) * 2;
        $scheduleBuilder = new ScheduleBuilder($teams, $rounds);
        $schedule = $scheduleBuilder->build();

        return $schedule->full();
    }
}
