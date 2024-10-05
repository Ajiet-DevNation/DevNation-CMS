<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AmbassadorsResource\Pages;
use App\Filament\Resources\AmbassadorsResource\RelationManagers;
use App\Models\Ambassadors;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AmbassadorsResource extends Resource
{
    protected static ?string $model = Ambassadors::class;

    protected static ?string $navigationLabel = 'Student Ambassadors';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationBadgeTooltip = 'The number of student ambassadors';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Ambassador Information')->schema([
                    TextInput::make('name')->label('Post name')->required(),
                    Select::make('user_id')->label('Community Member')->relationship('user', 'name')->required(),
                    Select::make('developer_group_id')->label('Developer Group')->relationship('developerGroup', 'name')->required(),
                ])->columns(3)->collapsible(),
                Section::make('Validity')->schema([
                    DatePicker::make('start_date')->label('Start Date')->required()->default(now()),
                    DatePicker::make('end_date')->label('End Date')->required()->default(now()),
                ])->columns(2)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListAmbassadors::route('/'),
            'create' => Pages\CreateAmbassadors::route('/create'),
            'edit' => Pages\EditAmbassadors::route('/{record}/edit'),
        ];
    }
}
