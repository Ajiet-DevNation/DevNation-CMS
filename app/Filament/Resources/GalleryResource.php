<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->image()->acceptedFileTypes(['image/*'])->required()
                    ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                    ->directory('galleries')->uploadingMessage('Uploading...')->downloadable()->preserveFilenames()->openable(),
                TextInput::make('name')->label('Name')->required(),
                TextInput::make('description')->label('Description')->required(),
                TextInput::make('meta_description')->label('Meta Description'),
                TextInput::make('meta_keywords')->label('Meta Keywords'),
                TextInput::make('meta_title')->label('Meta Title'),
                FileUpload::make('gallery_images')->image()->acceptedFileTypes(['image/*'])->multiple()
                ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                ->directory('gallery_images')->uploadingMessage('Uploading...')->downloadable()->preserveFilenames()->openable(),
                Toggle::make('is_published')->label('Published')->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Image')->circular()->searchable(),
                TextColumn::make('name')->label('Name')->searchable(),
                TextColumn::make('description')->label('Description')->searchable(),
                ImageColumn::make('gallery_images')->label('Gallery Images')->circular()->stacked(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
