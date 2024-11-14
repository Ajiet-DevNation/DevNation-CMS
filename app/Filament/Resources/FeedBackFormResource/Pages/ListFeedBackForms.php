<?php

namespace App\Filament\Resources\FeedBackFormResource\Pages;

use App\Filament\Resources\FeedBackFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeedBackForms extends ListRecords
{
    protected static string $resource = FeedBackFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
