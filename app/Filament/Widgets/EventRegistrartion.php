<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\EventRegisteraion;
use App\Models\Events;

class EventRegistrartion extends ChartWidget
{
    protected static ?string $heading = 'Number of Users Registered per Event';

    protected function getData(): array
    {
        // Get the number of users registered per event
        $registrationCounts = EventRegisteraion::selectRaw('events.name as event_name, COUNT(*) as count')
            ->join('events', 'event_registeraions.event_id', '=', 'events.id') // Join with events table
            ->groupBy('events.name')
            ->orderBy('count', 'desc') // Optionally order by count
            ->pluck('count', 'event_name') // Get count keyed by event name
            ->toArray();

        // Prepare the data for the chart
        return [
            'datasets' => [
                [
                    'label' => 'Number of Registrations',
                    'data' => array_values($registrationCounts), // User counts
                    'backgroundColor' => ['rgb(75, 192, 192)'], // You can change the color as needed
                ],
            ],
            'labels' => array_keys($registrationCounts), // Event names for labels
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
