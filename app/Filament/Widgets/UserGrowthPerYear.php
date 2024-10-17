<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;

class UserGrowthPerYear extends ChartWidget
{
    protected static ?string $heading = 'User Growth Over the Past 5 Years';

    protected function getData(): array
    {
        // Get the current year
        $currentYear = now()->format('Y');

        // Prepare an array for the last 5 years
        $years = range($currentYear - 4, $currentYear);

        // Get user counts grouped by year for the last 5 years
        $userCounts = User::selectRaw('strftime("%Y", created_at) as year, COUNT(*) as count')
            ->whereRaw('strftime("%Y", created_at) >= ?', [$currentYear - 4]) // Filter for the last 5 years
            ->groupByRaw('strftime("%Y", created_at)')
            ->orderByRaw('strftime("%Y", created_at)')
            ->pluck('count', 'year')
            ->toArray();

        // Initialize an array for the user data for the past 5 years
        $userData = array_fill_keys($years, 0);

        // Fill in the user counts for the years where users were created
        foreach ($userCounts as $year => $count) {
            $userData[(int)$year] = $count; // Cast year to integer for array indexing
        }

        return [
            'datasets' => [
                [
                    'label' => 'Number of Users',
                    'data' => array_values($userData), // Use the array of user counts
                    'backgroundColor' => ['rgb(54, 162, 235)'], // You can change the color as needed
                ],
            ],
            'labels' => array_map(fn($year) => (string)$year, $years), // Convert years to strings for labels
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
