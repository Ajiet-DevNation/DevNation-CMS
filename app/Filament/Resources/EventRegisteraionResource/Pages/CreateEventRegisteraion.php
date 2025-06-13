<?php

namespace App\Filament\Resources\EventRegisteraionResource\Pages;

use App\Filament\Resources\EventRegisteraionResource;
use App\Notifications\EventNotification;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventRegisteraion extends CreateRecord
{
    protected static string $resource = EventRegisteraionResource::class;

}
