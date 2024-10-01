<?php

namespace App\Filament\Resources\EventRegisteraionResource\Pages;

use App\Filament\Resources\EventRegisteraionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventRegisteraion extends EditRecord
{
    protected static string $resource = EventRegisteraionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
