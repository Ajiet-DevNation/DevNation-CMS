<?php

namespace App\Filament\Resources\DeveloperGroupResource\Pages;

use App\Filament\Resources\DeveloperGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeveloperGroups extends ListRecords
{
    protected static string $resource = DeveloperGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
