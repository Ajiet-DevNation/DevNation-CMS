<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedBackFormResource\Pages;
use App\Filament\Resources\FeedBackFormResource\RelationManagers;
use App\Models\FeedBackForm;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
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

class FeedBackFormResource extends Resource
{
    protected static ?string $model = FeedBackForm::class;
    protected static ?string $modelLabel = 'Feedback and Quiz Form';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Forms';
    protected static ?string $navigationGroup = 'Event Management';
    protected static ?string $navigationBadgeTooltip = 'The number of forms';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Event Details')->schema([
                    Select::make('event_id')->relationship('event', 'name')->columnSpanFull()->required(),
                ])->columns(2)->collapsible(),
                Section::make('Form Settings')->schema([
                    Section::make('FeedBack')->schema([
                        TextInput::make('form_link')->label('FeedBack Form Link')->required(),
                        ToggleButtons::make('feedback_active')->label('Activate Feedback link')->boolean()->grouped()->default(state: false),
                    ])->columns(2)->collapsible(),  
                    Section::make('QuizBack')->schema([
                        TextInput::make('quiz_link')->label('Quiz')->required(),
                        ToggleButtons::make('quiz_active')->label('Activate Quiz link')->boolean()->grouped()->default(false),
                    ])->columns(2)->collapsible(),  
                ])->columns(2)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event.name')->label('Event')->searchable()->sortable(),
                TextColumn::make('form_link')->label('FeedBack Form')->getStateUsing(fn($record) => basename('feedBack form'))
                ->url(fn($record) => $record->form_link)->openUrlInNewTab(),
                IconColumn::make('feedback_active')->label('Feedback Active')->boolean(),
                TextColumn::make('quiz_link')->label('Quiz Form')->getStateUsing(fn($record) => basename('quiz link'))->url(fn($record) => $record->quiz_link)->openUrlInNewTab(),
                IconColumn::make('quiz_active')->label('Quiz Active')->boolean(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListFeedBackForms::route('/'),
            'create' => Pages\CreateFeedBackForm::route('/create'),
            'edit' => Pages\EditFeedBackForm::route('/{record}/edit'),
        ];
    }
}
