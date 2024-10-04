<?php

namespace App\Filament\Resources\EventsResource\Pages;

use App\Filament\Resources\EventsResource;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateEvents extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = EventsResource::class;

    public function getSteps(): array
    {
        return [
            Step::make('Event Information')->schema([
                TextInput::make('name')->required()->label('Event Name')->placeholder('Enter the event name'),
                Select::make('event_type')->options([
                    'workshop' => 'Workshop',
                    'webinar' => 'Webinar',
                    'seminar' => 'Seminar',
                    'conference' => 'Conference',
                    'expo' => 'Expo',
                    'meetup' => 'Meetup',
                    'hackathon' => 'Hackathon',
                ])->required()->default('workshop'),
                RichEditor::make('description')->columnSpanFull()->required()->label('Event Description')->placeholder('Enter the event description'),
                FileUpload::make('banner')->required()->label('Event Banner')->image()->acceptedFileTypes(['image/*'])
                    ->deleteUploadedFileUsing(fn($file): mixed => Storage::disk('public')->delete($file))
                    ->directory('events')->downloadable()->preserveFilenames()->openable(),
                TextInput::make('location')->required()->label('Event Location')->placeholder('Enter the event location'),
                Select::make('status')->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'cancelled' => 'Cancelled',
                ])->required()->default('draft'),
                TextInput::make('max_attendees')->required()->label('Max Attendees')->placeholder('Enter the maximum number of attendees'),
            ])->columns(2),

            Step::make('Speaker Information')->schema([
                TextInput::make('speaker')->required()->label('Speaker Name')->placeholder('Enter the speaker name'),
                TextInput::make('speaker_mail')->required()->label('Speaker Email')->email()->placeholder('Enter the speaker email'),
            ])->columns(2),
            Step::make('Event Settings')->schema([
                ToggleButtons::make('is_featured')->label('is Featured?')->boolean()->grouped()->default(false),
                ToggleButtons::make('requires_registration')->label('Requires Registration?')->boolean()->grouped()->default(false),
                ToggleButtons::make('has_certificate')->label('Has Certificate?')->boolean()->grouped()->default(false),
                ToggleButtons::make('notify_attendees')->label('Notify Attendees?')->boolean()->grouped()->default(false),
                ToggleButtons::make('notify_attendance')->label('Notify Attendance?')->boolean()->grouped()->default(false),
            ])->columns(5),
            Step::make('Event dates')->schema([
                DatePicker::make('start_date')->required()->label('Start Date')->placeholder('Select the start date')->default(now()),
                DatePicker::make('end_date')->required()->label('End Date')->placeholder('Select the end date')->default(now()),
            ])->columns(2),
        ];
    }
}
