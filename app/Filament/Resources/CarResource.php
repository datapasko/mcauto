<?php

namespace App\Filament\Resources;

use App\Models\Car;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CarResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarResource\RelationManagers;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('registration')->required()->maxLength(255)->label('Matricula'),
                Select::make('brand')->options([
                    "Toyota",
                    "Honda",
                    "Ford",
                    "Chevrolet",
                    "BMW",
                    "Mercedes-Benz",
                    "Audi",
                    "Volkswagen",
                    "Ferrari",
                    "Lamborghini",
                    "Fiat",
                    "Renault",
                    "Peugeot",
                    "Citroën",
                    "Hyundai",
                    "Kia",
                    "Volvo",
                    "Tesla",
                    "Nissan",
                    "Mazda"
                ])
                ->searchable()
                ->required()
                ->label('Marca'),
                TextInput::make('model')->required()->maxLength(255)->label('Modelo'),
                Select::make('color')->options([
                    'Blanco', 
                    'Negro', 
                    'Azul', 
                    'Rojo', 
                    'Amarillo', 
                    'Verde', 
                    'Marron', 
                    'Gris', 
                    'Naranja',
                    'Rosa',
                    'Violeta'
                ])->required()->label('Color'),
                DatePicker::make('year')->required()->label('Año matriculación'),

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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return 'Coche';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Coches';
    }

    protected function getCreateButtonLabel(): string
    {
        return 'Guardar Carro';
    }
}
