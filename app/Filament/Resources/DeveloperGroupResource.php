<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeveloperGroupResource\Pages;
use App\Filament\Resources\DeveloperGroupResource\RelationManagers;
use App\Models\DeveloperGroup;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class DeveloperGroupResource extends Resource
{
    protected static ?string $model = DeveloperGroup::class;

    protected static ?string $navigationLabel = 'Student Developer Groups';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationBadgeTooltip = 'The number of Developer Groups';

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket-square';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Developer Group Information')->schema([     
                    TextInput::make('name')->label('Name')->required()->columnSpan(2),
                    FileUpload::make('image')->label('Image')->acceptedFileTypes(['image/*'])
                    ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                    ->directory('developerGroups')->uploadingMessage('Uploading...')->downloadable()->imageEditor()
                    ->resize(50)->preserveFilenames()->openable()->required(),
                    Textarea::make('description')->label('Description')->required()->rows(3),
                ])->columns(2)->collapsible(),
                Section::make('Provider Organisation')->schema([
                    TextInput::make('company')->label('Company')->required(),
                    TextInput::make('website')->label('Website')->required(),
                    DatePicker::make('start_date')->label('Start Date')->required()->default(now()),
                    DatePicker::make('end_date')->label('End Date')->required()->default(now()),
                ])->columns(2)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('company')->searchable()->sortable(),
                TextColumn::make('website')->searchable()->sortable(),
                TextColumn::make('start_date')->searchable()->sortable()->date('d-m-Y'),
                TextColumn::make('end_date')->searchable()->sortable()->date('d-m-Y'),
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
            'index' => Pages\ListDeveloperGroups::route('/'),
            'create' => Pages\CreateDeveloperGroup::route('/create'),
            'edit' => Pages\EditDeveloperGroup::route('/{record}/edit'),
        ];
    }
}
