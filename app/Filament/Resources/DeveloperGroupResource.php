<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeveloperGroupResource\Pages;
use App\Filament\Resources\DeveloperGroupResource\RelationManagers;
use App\Models\DeveloperGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeveloperGroupResource extends Resource
{
    protected static ?string $model = DeveloperGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListDeveloperGroups::route('/'),
            'create' => Pages\CreateDeveloperGroup::route('/create'),
            'edit' => Pages\EditDeveloperGroup::route('/{record}/edit'),
        ];
    }
}
