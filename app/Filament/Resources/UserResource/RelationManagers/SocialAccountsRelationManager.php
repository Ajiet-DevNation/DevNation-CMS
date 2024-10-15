<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
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
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->maxLength(255),
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
