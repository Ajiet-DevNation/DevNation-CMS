<?php

namespace App\Filament\Resources\SocialAccountsResource\Pages;

use App\Filament\Resources\SocialAccountsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialAccounts extends EditRecord
{
    protected static string $resource = SocialAccountsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
