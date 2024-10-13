<?php

namespace App\Filament\Resources\SocialAccountsResource\Pages;

use App\Filament\Resources\SocialAccountsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialAccounts extends ListRecords
{
    protected static string $resource = SocialAccountsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
