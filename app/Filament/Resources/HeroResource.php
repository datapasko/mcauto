<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Hero;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HeroResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HeroResource\RelationManagers;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    
    // Cambiar el nombre singular
    protected static ?string $modelLabel = 'Imagen Principal';

    // Cambiar el nombre plural
    protected static ?string $pluralModelLabel = 'Imágenes Principales';

    // Cambiar el nombre en la barra de navegación
    protected static ?string $navigationLabel = 'Imágenes Principales';

    // Agrupar en un grupo de navegación (opcional)
    protected static ?string $navigationGroup = 'Contenido';
    
    // Personalizar el título del formulario de creación
    protected static ?string $createFormTitle = 'Crear Imagen Principal';

    // Personalizar el título del formulario de edición
    protected static ?string $editFormTitle = 'Editar Imagen Principal';

    // Personalizar el título de la página de lista
    protected static ?string $listTitle = 'Lista de Imágenes Principales';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Titulo')->required(),
                Forms\Components\Textarea::make('description')->label('Descripción')->required(),
                
                Toggle::make('is_active')
                    ->label('Activar')
                    ->onColor('success')
                    ->offColor('danger')
                    ->afterStateUpdated(function ($state, callable $set, $record) {
                        // Desactivar otros registros cuando este se active
                        if ($state && $record) {
                            Hero::where('id', '!=', $record->id)->update(['is_active' => false]);
                        }
                    }),

                Forms\Components\FileUpload::make('image')
                    ->label('Agregar Imagen')
                    ->image()
                    ->directory('hero-images')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),                
                Tables\Columns\BooleanColumn::make('is_active')
                ->label('Activo'),
                Tables\Columns\ImageColumn::make('image'),
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
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}
