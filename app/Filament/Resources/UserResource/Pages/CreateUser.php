<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    // use CreateRecord\Concerns\HasWizard;
    protected static string $resource = UserResource::class;

    // public function getSteps(): array
    // {
    //     return [];
    // }
}
