<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateTemplateResource\Pages;
use App\Filament\Resources\CertificateTemplateResource\RelationManagers;
use App\Models\CertificateTemplate;
use Faker\Core\File;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SebastianBergmann\CodeUnit\FileUnit;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class CertificateTemplateResource extends Resource
{
    protected static ?string $model = CertificateTemplate::class;
    protected static ?string $modelLabel = 'Template';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Certificate Template';
    protected static ?string $navigationGroup = 'Certificate Settings';
    protected static ?string $navigationBadgeTooltip = 'The number of templates';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Template Details')->schema([
                    TextInput::make('template_name')->required()->columnSpanFull(),
                    Textarea::make('description'),
                    FileUpload::make('template_image'), 
                ])->columns(2)->collapsible(),
                Section::make('Settings')->schema([
                    TextInput::make('description_font_size')->numeric()->default(20),
                    TextInput::make('description_x_axis')->numeric()->default(360),
                    TextInput::make('description_y_axis')->numeric()->default(360),
                    TextInput::make('description_angle')->numeric()->default(0),
                    TextInput::make('unique_id_font_size')->numeric()->default(20),
                ])->columns(3)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('template_name')->searchable()->sortable(),
                ImageColumn::make('template_image')->circular()->searchable()->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    DeleteAction::make(),
                ]),
               
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
            'index' => Pages\ListCertificateTemplates::route('/'),
            'create' => Pages\CreateCertificateTemplate::route('/create'),
            'edit' => Pages\EditCertificateTemplate::route('/{record}/edit'),
        ];
    }
}
