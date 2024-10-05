<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateGallery extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;
    protected static string $resource = GalleryResource::class;

    public function getSteps(): array
    {
        return [
            Step::make('Gallery Information')->schema([
                TextInput::make('name')->label('Name')->columnSpanFull()->required(),
                FileUpload::make('image')->image()->acceptedFileTypes(['image/*'])->required()
                    ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                    ->directory('galleries')->uploadingMessage('Uploading...')->downloadable()->preserveFilenames()->openable(),
                Textarea::make('description')->label('Description')->required()->rows(3),
            ])->columns(2),
            Step::make('Gallery Images and Control')->schema([
                FileUpload::make('gallery_images')->image()->acceptedFileTypes(['image/*'])->multiple()
                    ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                    ->directory('gallery_images')->uploadingMessage('Uploading...')->downloadable()->preserveFilenames()->openable(),
                Toggle::make('is_published')->label('Published')->default(false),
            ])->columns(2),
        ];
    }
}
