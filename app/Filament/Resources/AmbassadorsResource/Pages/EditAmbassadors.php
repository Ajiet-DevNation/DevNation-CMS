<?php

namespace App\Filament\Resources\AmbassadorsResource\Pages;

use App\Filament\Resources\AmbassadorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAmbassadors extends EditRecord
{
    protected static string $resource = AmbassadorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
