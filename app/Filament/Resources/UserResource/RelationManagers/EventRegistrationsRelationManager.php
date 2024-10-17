<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventRegistrationsRelationManager extends RelationManager
{
    protected static string $relationship = 'eventRegistrations';
    protected static ?string $modelLabel = 'Registeration';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
            ->columns([
                TextColumn::make('user.name')->label('User')->searchable()->sortable(),
                TextColumn::make('event.name')->label('Event')->searchable()->sortable(),
                SelectColumn::make('status')->options([
                    'pending' => 'Pending',
                    'success' => 'Success',
                    'rejected' => 'Rejected',
                ])->label('Status')->sortable(),
                IconColumn::make('attended')->label('Attended')->boolean(),    
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
