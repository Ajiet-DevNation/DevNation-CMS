<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;

class UserGrowthPerCurrentMonth extends ChartWidget
{
    protected static ?string $heading = 'User Growth Current Year';

    protected function getData(): array
    {
        $year = now()->format('Y');

        // Get users grouped by month for the specified year
        $usersPerMonth = User::selectRaw('strftime("%m", created_at) as month, COUNT(*) as count')
            ->whereRaw('strftime("%Y", created_at) = ?', [$year])  // Filter by year
            ->groupByRaw('strftime("%m", created_at)')
            ->orderByRaw('strftime("%m", created_at)')
            ->pluck('count', 'month')
            ->toArray();

        // Initialize an array for 12 months set to 0
        $userData = array_fill(1, 12, 0);

        // Fill in the user counts for the months where users were created
        foreach ($usersPerMonth as $month => $count) {
            $userData[(int)$month] = $count;  // Cast month to integer for array indexing
        }

        return [
            'datasets' => [
                [
                    'label' => 'Number of Users in ' . $year,  // Add year to the label
                    'data' => array_values($userData),  // Use the array of users per month
                    'backgroundColor' => ['rgb(75, 192, 192)'], // You can change the color as needed
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];

    }

    protected function getType(): string
    {
        return 'line';
    }
}
