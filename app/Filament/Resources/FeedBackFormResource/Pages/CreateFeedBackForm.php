<?php

namespace App\Filament\Resources\FeedBackFormResource\Pages;

use App\Filament\Resources\FeedBackFormResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedBackForm extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;
    protected static string $resource = FeedBackFormResource::class;

    public function getSteps(): array
    {
        return [
            Step::make('FeedBack Form Details')->schema([
                Select::make('event_id')->label('Event')->relationship('event', 'name')->required()->searchable()->preload()->columnSpanFull(),
                TextInput::make('form_link')->label('FeedBack Form Link')->required()->placeholder('Enter the form link'),
                ToggleButtons::make('feedback_active')->label('Feedback Active')->boolean()->grouped()->default(false),
            ])->columns(2),
            Step::make('Quiz Details')->schema([
                TextInput::make('quiz_link')->label('Quiz Link')->required()->placeholder('Enter the form link'),
                ToggleButtons::make('quiz_active')->label('Feedback Active')->boolean()->grouped()->default(false),
            ])->columns(2),
            
        ];
    }
}
