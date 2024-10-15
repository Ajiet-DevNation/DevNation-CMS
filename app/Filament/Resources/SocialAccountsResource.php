<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialAccountsResource\Pages;
use App\Filament\Resources\SocialAccountsResource\RelationManagers;
use App\Models\SocialAccounts;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialAccountsResource extends Resource
{
    protected static ?string $model = SocialAccounts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->relationship('user', 'name')->required(),
                TextInput::make('github')->required()->url()->rule('regex:/^https:\/\/github\.com\/[A-Za-z0-9]+$/'),            
                TextInput::make('linkedIn')->required(),
                TextInput::make('twitter')->required(),
                TextInput::make('facebook')->required(),
                TextInput::make('instagram')->required(),
                TextInput::make('website')->required(),
                TextInput::make('others')->required(),
                ToggleButtons::make('is_verified')->label('is Verfied')->boolean()->grouped()->default(false),
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
            'index' => Pages\ListSocialAccounts::route('/'),
            'create' => Pages\CreateSocialAccounts::route('/create'),
            'edit' => Pages\EditSocialAccounts::route('/{record}/edit'),
        ];
    }
}
