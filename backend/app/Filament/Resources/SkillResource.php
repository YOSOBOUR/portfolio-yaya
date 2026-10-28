<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;
    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationLabel = 'Compétences';
    protected static ?string $modelLabel = 'compétence';
    protected static ?string $pluralModelLabel = 'compétences';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Nom')->required(),
            Forms\Components\TextInput::make('icon')->label('Icône (nom sur simpleicons.org)')
                ->helperText('Ex : html5, react, php, laravel, mysql, github, tailwindcss'),
            Forms\Components\Select::make('category')->label('Catégorie')->required()
                ->options(['Développement' => 'Développement', 'Outils' => 'Outils']),
            Forms\Components\Select::make('level')->label('Niveau')->required()
                ->options(['Avancé' => 'Avancé', 'Intermédiaire' => 'Intermédiaire', 'Débutant' => 'Débutant']),
            Forms\Components\TextInput::make('sort')->label('Ordre')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort')
            ->reorderable('sort')
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nom')->searchable(),
                Tables\Columns\TextColumn::make('category')->label('Catégorie'),
                Tables\Columns\TextColumn::make('level')->label('Niveau')->badge(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit'   => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
