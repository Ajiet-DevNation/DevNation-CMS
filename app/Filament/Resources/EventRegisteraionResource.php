<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventRegisteraionResource\Pages;
use App\Filament\Resources\EventRegisteraionResource\RelationManagers;
use App\Models\EventRegisteraion;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventRegisteraionResource extends Resource
{
    protected static ?string $model = EventRegisteraion::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $modelLabel = 'Registeration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->required()->relationship('user', 'name')->preload(),
                Select::make('event_id')->required()->relationship('event', 'name')->preload(),
                Select::make('status')->options([
                    'pending' => 'Pending',
                    'success' => 'Success',
                    'rejected' => 'Rejected',
                ])->default('pending'),
                Toggle::make('attended')->default(false),
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
            'index' => Pages\ListEventRegisteraions::route('/'),
            'create' => Pages\CreateEventRegisteraion::route('/create'),
            'edit' => Pages\EditEventRegisteraion::route('/{record}/edit'),
        ];
    }
}
