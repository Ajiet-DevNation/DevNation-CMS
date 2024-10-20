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

class CertificateTemplateResource extends Resource
{
    protected static ?string $model = CertificateTemplate::class;
    protected static ?string $modelLabel = 'Template';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Certificate Template';
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
            'index' => Pages\ListCertificateTemplates::route('/'),
            'create' => Pages\CreateCertificateTemplate::route('/create'),
            'edit' => Pages\EditCertificateTemplate::route('/{record}/edit'),
        ];
    }
}
