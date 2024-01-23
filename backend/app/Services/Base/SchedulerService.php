<?php

namespace App\Services\Base;

use App\Enums\SchedulerEnum;

class SchedulerService
{
    public function calculateWeeklyPlan($developers, $tasks)
    {
        $totalDevelopers = count($developers);
        $weeklyHours = $totalDevelopers * SchedulerEnum::WEEKLY_WORKING_HOUR;
        $weeklyPlan = [];
        $remainingTasks = [];

        foreach ($tasks as $task) {
            $developer = $developers->where('id', $task->developer_id)->first();

            if (! $developer) {
                continue;
            }

            if ($task->hour <= 0) {
                continue;
            }

            $dailyEffort = $task->hour / $weeklyHours;
            $remainingHours = $task->hour;

            for ($i = 1; $i <= $totalDevelopers; $i++) {

                $dailyPlan[$i][] = [
                    'developer' => $developer->full_name,
                    'task' => $task->name,
                    'effort' => min($remainingHours, $dailyEffort * 45),
                ];

                $remainingHours -= min($remainingHours, $dailyEffort * 45);
            }

            $weeklyPlan[] = $dailyPlan;
        }

        return [
            'total_weeks' => count($weeklyPlan),
            'remaining_tasks' => count($remainingTasks),
            'weekly_plan' => $weeklyPlan,
        ];
    }
}
