<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationLabel = 'DevNation Gallery';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationBadgeTooltip = 'The number of galleries';

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Gallery Information')->schema([
                    TextInput::make('name')->label('Name')->columnSpanFull()->required(),
                    FileUpload::make('image')->image()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])->required()
                        ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                        ->directory('galleries')->uploadingMessage('Uploading...')->downloadable()
                        ->preserveFilenames()->openable(),
                    Textarea::make('description')->label('Description')->required()->rows(3),
                ])->columns(2)->collapsible(),
                Section::make('Meta Data')->schema([
                    TextInput::make('meta_keywords')->label('Meta Keywords'),
                    TextInput::make('meta_title')->label('Meta Title'),
                    Textarea::make('meta_description')->label('Meta Description')->columnSpanFull()->rows(4),
                ])->columns(2)->collapsible(),
                Section::make('Gallery Images and Control')->schema([
                    FileUpload::make('gallery_images')->image()->acceptedFileTypes(['image/*'])->multiple()
                        ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                        ->directory('gallery_images')->uploadingMessage('Uploading...')
                        ->downloadable()->preserveFilenames()->openable(),
                    Toggle::make('is_published')->label('Published')->default(false),
                ])->columns(2)->collapsible(),
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
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
