<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialAccountsRelationManager extends RelationManager
{
    protected static string $relationship = 'socialAccounts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->relationship('user', 'name')->required()->columnSpanFull(),
                TextInput::make('github')->required()->url()->rule('regex:/^https:\/\/github\.com\/[A-Za-z0-9]+$/'),            
                TextInput::make('linkedIn')->url()->rule('regex:/^https:\/\/(www\.)?linkedin\.com\/in\/[A-Za-z0-9-]+$/')
                ->label('LinkedIn')->required(),
                TextInput::make('twitter')->url()->label('Twitter (X)')->required()
                ->rule('regex:/^https:\/\/(x\.com|twitter\.com)\/[A-Za-z0-9_]+$/'),
                TextInput::make('facebook')->url()
                ->rule('regex:/^https:\/\/(www\.)?facebook\.com\/(profile\.php\?id=[0-9]+|[A-Za-z0-9.]+)$/')
                ->label('Facebook')->required(),
                TextInput::make('instagram')->url()
                ->rule('regex:/^https:\/\/(www\.)?instagram\.com\/[A-Za-z0-9_.]+\/$/')
                ->label('Instagram')->required(),
                TextInput::make('website')->required(),
                TextInput::make('others'),
                ToggleButtons::make('is_verified')->label('is Verfied')->boolean()->grouped()->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
            ->columns([
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
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
