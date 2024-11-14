<?php

namespace App\Filament\Resources\FeedBackFormResource\Pages;

use App\Filament\Resources\FeedBackFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeedBackForm extends EditRecord
{
    protected static string $resource = FeedBackFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
