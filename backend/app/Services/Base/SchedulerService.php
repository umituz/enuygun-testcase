<?php

namespace App\Services\Base;

use App\Enums\SchedulerEnum;

class SchedulerService
{
    private $weeklyHours = SchedulerEnum::WEEKLY_WORKING_HOUR;

    public function calculateWeeklyPlan($developers, $tasks): array
    {
        $totalDevelopers = count($developers);
        $totalDevelopersWeeklyHours = $totalDevelopers * SchedulerEnum::WEEKLY_WORKING_HOUR;
        $weeklyPlan = [];

        foreach ($tasks as $task) {
            $developer = $developers->where('id', $task->developer_id)->first();

            if (! $developer) {
                continue;
            }

            if ($task->hour <= 0) {
                continue;
            }

            $dailyEffort = $task->hour / $totalDevelopersWeeklyHours;
            $remainingHours = $task->hour;

            for ($i = 1; $i <= $totalDevelopers; $i++) {
                $dailyPlan[$i][] = [
                    'developer' => $developer->full_name,
                    'task' => $task->name,
                    'effort' => min($remainingHours, $dailyEffort * $this->weeklyHours),
                ];

                $remainingHours -= min($remainingHours, $dailyEffort * $this->weeklyHours);
            }

            $weeklyPlan[] = $dailyPlan;
        }

        return [
            'total_weeks' => count($weeklyPlan),
            'weekly_plan' => $weeklyPlan,
        ];
    }
}
