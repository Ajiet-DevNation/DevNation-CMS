<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\DeveloperGroup;
use App\Models\gallery;
use App\Models\College;
class AdeveloperGroupsStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Developer Groups', DeveloperGroup::count())
                ->description('Total developer groups')
                ->icon('heroicon-o-users')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Galleries', gallery::count())
                ->description('Total galleries')
                ->icon('heroicon-o-users')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Colleges', College::count())
                ->description('Total colleges')
                ->icon('heroicon-o-users')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
