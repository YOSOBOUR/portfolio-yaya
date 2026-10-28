<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Parcours';
    protected static ?string $modelLabel = 'étape du parcours';
    protected static ?string $pluralModelLabel = 'parcours';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('type')->label('Type')->required()
                ->options([
                    'academic'     => 'Parcours académique',
                    'professional' => 'Parcours professionnel',
                ]),
            Forms\Components\TextInput::make('title')->label('Titre')->required(),
            Forms\Components\TextInput::make('organization')->label('Établissement / Entreprise')->required(),
            Forms\Components\TextInput::make('period')->label('Période')->required()
                ->helperText('Ex : Sept. 2026 – En cours'),
            Forms\Components\Textarea::make('description')->rows(3),
            Forms\Components\TextInput::make('sort')->label('Ordre')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort')
            ->reorderable('sort')
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('organization')->label('Organisation'),
                Tables\Columns\TextColumn::make('type')->label('Type')->badge(),
                Tables\Columns\TextColumn::make('period')->label('Période'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit'   => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
