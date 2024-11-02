<?php

namespace App\Filament\Resources\EventRegisteraionResource\Pages;

use App\Filament\Resources\EventRegisteraionResource;
use App\Notifications\EventNotification;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventRegisteraion extends CreateRecord
{
    protected static string $resource = EventRegisteraionResource::class;

    protected function afterCreate(): void
    {
        $registration = $this->record;

        if ($registration->user && $registration->event) {
            // Send the notification
            $registration->user->notify(new EventNotification($registration->event));
        }
    }
}
