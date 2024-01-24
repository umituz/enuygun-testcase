<?php


namespace App\Services\Base;

use App\Enums\SchedulerEnum;

class SchedulerService
{
    private $weeklyHours = SchedulerEnum::WEEKLY_WORKING_HOUR;

    public function calculateWeeklyPlan($developers, $tasks): array
    {
        $totalDevelopers = count($developers);
        $totalDevelopersWeeklyHours = $totalDevelopers * $this->weeklyHours;
        $weeklyPlan = [];

        for ($weekNumber = 1; $weekNumber <= count($tasks); $weekNumber++) {
            $dailyPlan = [];

            foreach ($tasks as $task) {
                $developer = $developers->where('id', $task->developer_id)->first();

                if (!$developer || $task->hour <= 0) {
                    continue;
                }

                $dailyEffort = $task->hour / $totalDevelopersWeeklyHours;
                $remainingHours = $task->hour;

                for ($i = 1; $i <= $totalDevelopers; $i++) {
                    $dailyPlan[] = [
                        'developer' => $developer->full_name,
                        'task' => $task->name,
                        'effort' => min($remainingHours, $dailyEffort * $this->weeklyHours),
                    ];

                    $remainingHours -= min($remainingHours, $dailyEffort * $this->weeklyHours);
                }
            }

            $weeklyPlan[] = [
                'week_number' => $weekNumber,
                'tasks' => $dailyPlan,
            ];
        }

        $formattedWeeklyPlan = [];
        foreach ($weeklyPlan as $week) {
            $formattedWeeklyPlan[] = [
                'week_number' => $week['week_number'],
                'tasks' => array_unique($week['tasks'], SORT_REGULAR),
            ];
        }

        return [
            'total_weeks' => count($formattedWeeklyPlan),
            'weekly_plan' => $formattedWeeklyPlan,
        ];
    }
}
