<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AmbassadorRelationManager extends RelationManager
{
    protected static string $relationship = 'ambassador';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('user.name')->label('Community Member')->searchable()->sortable(),
                TextColumn::make('developerGroup.name')->label('Developer Group')->searchable()->sortable(),
                TextColumn::make('start_date')->searchable()->sortable()->date('d-m-Y'),
                TextColumn::make('end_date')->searchable()->sortable()->date('d-m-Y'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                ViewAction::make(),
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
