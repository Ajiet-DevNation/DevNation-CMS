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
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialAccountsResource extends Resource
{
    protected static ?string $model = SocialAccounts::class;

    protected static ?string $navigationIcon = 'heroicon-o-device-phone-mobile';

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
                TextInput::make('others'),
                ToggleButtons::make('is_verified')->label('is Verfied')->boolean()->grouped()->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('user.name')->label('User'),
                TextColumn::make('user.email')->label('User Email'),
                TextColumn::make('github')->label('Github')->getStateUsing(fn($record) => basename(parse_url($record->github, PHP_URL_PATH))) ->url(fn($record) => $record->github)->openUrlInNewTab(),
                TextColumn::make('linkedIn')->label('LinkedIn')->getStateUsing(fn($record) => basename(parse_url($record->linkedIn, PHP_URL_PATH)))
                ->url(fn($record) => $record->linkedIn)
                ->openUrlInNewTab(),
                TextColumn::make('twitter')->label('Twitter')->getStateUsing(fn($record) => basename(parse_url($record->twitter, PHP_URL_PATH)))
                ->url(fn($record) => $record->twitter)
                ->openUrlInNewTab(),
                TextColumn::make('facebook')->label('Facebook')->getStateUsing(fn($record) => basename(parse_url($record->facebook, PHP_URL_PATH)))
                ->url(fn($record) => $record->facebook)
                ->openUrlInNewTab()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('instagram')->label('Instagram')->getStateUsing(fn($record) => basename(parse_url($record->instagram, PHP_URL_PATH)))
                ->url(fn($record) => $record->instagram)
                ->openUrlInNewTab(),
                TextColumn::make('website')->label('Website')->getStateUsing(fn($record) => parse_url($record->website, PHP_URL_HOST))
                ->url(fn($record) => $record->website)->toggleable(isToggledHiddenByDefault: true)
                ->openUrlInNewTab(),
                TextColumn::make('others')->label('Others'),
                IconColumn::make('is_verified')->label('Is Verified')->boolean(),  
            ])
            ->filters([
                //9880078166
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
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
            'index' => Pages\ListSocialAccounts::route('/'),
            'create' => Pages\CreateSocialAccounts::route('/create'),
            'edit' => Pages\EditSocialAccounts::route('/{record}/edit'),
        ];
    }
}
