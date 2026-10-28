<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Réalisations';
    protected static ?string $modelLabel = 'projet';
    protected static ?string $pluralModelLabel = 'projets';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->label('Titre')->required(),
            Forms\Components\Textarea::make('description')->required()->rows(4),
            Forms\Components\FileUpload::make('image')->label('Image')
                ->image()->disk('public')->directory('projects')->imageEditor(),
            Forms\Components\TextInput::make('tags')->label('Technologies (séparées par des virgules)')
                ->helperText('Ex : Laravel, MySQL, Tailwind. Elles servent aussi de filtres sur le site.'),
            Forms\Components\TextInput::make('link')->label('Lien GitHub / démo')->url(),
            Forms\Components\TextInput::make('sort')->label('Ordre')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort')
            ->reorderable('sort')
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Image')->disk('public'),
                Tables\Columns\TextColumn::make('title')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('tags')->label('Technologies'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit'   => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
