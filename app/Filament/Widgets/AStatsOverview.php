<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Role;

class AStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
         // Get the count of roles grouped by their 'name' attribute
         $roleCounts = Role::select('name', Role::raw('count(*) as count'))
         ->groupBy('name')
         ->get();

        // Create a Stat object for each role count and add it to the stats overview
        $stats = [];
        foreach ($roleCounts as $role) {
        $stats[] = Stat::make($role->name, $role->count)
                ->description('Total count for ' . $role->name)
                ->icon('heroicon-o-user-group')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]);
        }

        return $stats;
    }
}
