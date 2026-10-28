<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profil & CV';
    protected static ?string $modelLabel = 'profil';
    protected static ?string $pluralModelLabel = 'profil';
    protected static ?int $navigationSort = 1;

    // Une seule fiche : pas de création
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('full_name')->label('Nom complet')->required(),
            Forms\Components\TextInput::make('job_title')->label('Titre')->required(),
            Forms\Components\Textarea::make('bio')->label('Description')->required()->rows(4),
            Forms\Components\TextInput::make('tags')->label('Mots-clés (séparés par des virgules)'),
            Forms\Components\FileUpload::make('photo')->label('Photo de profil')
                ->image()->disk('public')->directory('profile')->imageEditor(),
            Forms\Components\FileUpload::make('cv')->label('CV (PDF)')
                ->disk('public')->directory('cv')->acceptedFileTypes(['application/pdf']),
            Forms\Components\TextInput::make('email')->label('E-mail')->email()->required(),
            Forms\Components\TextInput::make('phone')->label('Téléphone'),
            Forms\Components\TextInput::make('github')->label('GitHub')->url(),
            Forms\Components\TextInput::make('linkedin')->label('LinkedIn')->url(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')->disk('public')->circular(),
                Tables\Columns\TextColumn::make('full_name')->label('Nom'),
                Tables\Columns\TextColumn::make('email')->label('E-mail'),
            ])
            ->actions([Tables\Actions\EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'edit'  => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
