<?php

namespace App\Filament\Resources\DeveloperGroupResource\Pages;

use App\Filament\Resources\DeveloperGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeveloperGroup extends EditRecord
{
    protected static string $resource = DeveloperGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
