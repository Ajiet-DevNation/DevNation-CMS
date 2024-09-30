<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard\Step;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateUser extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;
    protected static string $resource = UserResource::class;

    public function getSteps(): array
    {
        return [
            Step::make('User Information')->schema([
                TextInput::make('name')->label('Name')->required(),
                TextInput::make('email')->label('Email')->email()->required(),
                TextInput::make('phone')->label('Phone')->required(),
                Select::make('role')->label('Role')->options([
                    'core_member' => 'Core Member',
                    'cordinator' => 'Cordinator',
                    'member' => 'Member',
                ])->required()->default('member'),
            ])->columns(2),
            Step::make('Academic Information')->schema([
                FileUpload::make('image')->label('Image')->image()->required()->acceptedFileTypes(['image/*'])->columnSpanFull()
                    ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))->imageEditor()
                    ->directory('users')->uploadingMessage('Uploading...')->downloadable()->preserveFilenames()->openable(),
                Select::make('branch')->label('Branch')->required()->options([
                    'CSE' => 'Computer Science and Engineering',
                    'ISE' => 'Information Science and Engineering',
                    'ECE' => 'Electronics and Communication Engineering',
                    'EEE' => 'Electrical and Electronics Engineering',
                    'ME' => 'Mechanical Engineering',
                    'CE' => 'Civil Engineering',
                    'AE' => 'Aeronautical Engineering',
                    'EIE' => 'Electronics and Instrumentation Engineering',
                    'MCA' => 'Master of Computer Applications',
                    'MBA' => 'Master of Business Administration',
                ]),
                TextInput::make('usn')->required()
                    ->rules(['regex:/^[0-9]{1}[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}$/'])
                    ->validationAttribute('USN')->unique(ignoreRecord: true)
                    ->helperText('Ex: 4JK21CS016'),
                Select::make('semester')->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                ])->required()->default('1'),
            ])->columns(3),
            Step::make('Permission and Roles')->schema([
                TextInput::make('password')->required()->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                    ->password()->placeholder('********')->dehydrated(fn($state) => filled($state)),
                Toggle::make('is_alumini')->default(false),
                Toggle::make('is_admin')->default(false),
                Toggle::make('is_verified')->default(false),
            ])->columns(2),
        ];
    }
}
