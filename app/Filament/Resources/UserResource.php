<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

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
                ImageColumn::make('image')->circular(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('phone')->searchable()->sortable(),
                IconColumn::make('is_verified')->boolean(),
                    // ->icon(fn (User $user) => $user->is_verified ? 'heroicon-s-check-circle' : 'heroicon-s-x-circle')
                    // ->label(fn (User $user) => $user->is_verified ? 'Verified' : 'Not Verified'),
                TextColumn::make('role')->searchable()->sortable(),
                TextColumn::make('branch')->searchable()->sortable(),
                TextColumn::make('semester')->searchable()->sortable(),
                IconColumn::make('is_alumini')->boolean(),
                IconColumn::make('is_admin')->boolean(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'core_member' => 'Core Member',
                        'member' => 'Member',
                    ])
                    ->label('Role'),
                SelectFilter::make('branch')->options([
                    'CSE' => 'CSE',
                    'ISE' => 'ISE',
                    'ECE' => 'ECE',
                    'ME' => 'ME',
                    'CV' => 'CV',
                    'AIDS' => 'AIDS',  
                    'ICB' => 'ICB',
                    'AIML' => 'AIML',
                ])->label('Branch'),
                SelectFilter::make('semester')->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                ])->label('Semester'),
                Filter::make('is_verified')->label('Verified')->toggle(),
            ])->filtersFormColumns(2)
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
