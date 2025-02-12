<?php

namespace App\Filament\Resources;

use App\Models\Car;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
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

        $user = Auth::user();
        $maxImages = 5; // Limitar a un máximo de 5 imágenes        

        return $form
            ->schema([
                Hidden::make('user_id')->default(fn () => Filament::auth()->user()->id),
                Grid::make(4)
                    ->schema([
                        TextInput::make('registration')->required()->maxLength(255)->label('Matricula'),

                        Select::make('brand')->options([
                            "Toyota" => "Toyota",
                            "Honda" => "Honda",
                            "Ford" => "Ford",
                            "Chevrolet" => "Chevrolet",
                            "BMW" => "BMW",
                            "Mercedes-Benz" => "Mercedes-Benz",
                            "Audi" => "Audi",
                            "Volkswagen" => "Volkswagen",
                            "Ferrari" => "Ferrari",
                            "Lamborghini" => "Lamborghini",
                            "Fiat" => "Fiat",
                            "Renault" => "Renault",
                            "Peugeot" => "Peugeot",
                            "Citroën" => "Citroën",
                            "Hyundai" => "Hyundai",
                            "Kia" => "Kia",
                            "Volvo" => "Volvo",
                            "Tesla" => "Tesla",
                            "Nissan" => "Nissan",
                            "Mazda" => "Mazda"
                        ])
                        ->searchable()
                        ->required()
                        ->label('Marca'),
        
                        TextInput::make('model')->required()->maxLength(255)->label('Modelo'),
        
                        Select::make('color')->options([
                            "Blanco" => "Blanco", 
                            "Negro" => "Negro", 
                            "Azul" => "Azul", 
                            "Rojo" => "Rojo", 
                            "Amarillo" => "Amarillo", 
                            "Verde" => "Verde", 
                            "Marron" => "Marron", 
                            "Gris" => "Gris", 
                            "Naranja" => "Naranja",
                            "Rosa" => "Rosa",
                            "Violeta" => "Violeta"
                        ])
                            ->searchable()
                            ->required()
                            ->label('Color'),
        
                        DatePicker::make('year')
                            ->required()
                            ->label('Año matriculación'),

                        Select::make('fuel')->options([
                            "Diésel" => "Diésel", 
                            "Eléctrico" => "Eléctrico", 
                            "Gasolina" => "Gasolina", 
                            "GLP" => "GLP", 
                            "Híbrido" => "Híbrido", 
                        ])
                            ->searchable()
                            ->required()
                            ->label('Combustible'),

                        Select::make('transmission')->options([
                            "Automático" => "Automático", 
                            "Manual" => "Manual",  
                        ])
                            ->searchable()
                            ->required()
                            ->label('Transmisión'),

                        Select::make('doors')->options([
                            2 => 2, 
                            3 => 3, 
                            4 => 4, 
                            5 => 5  
                        ])
                            ->searchable()
                            ->required()
                            ->label('Puertas'),

                        Select::make('places')->options([
                            2 => 2, 
                            3 => 3, 
                            4 => 4, 
                            5 => 5,
                            7 => 7,
                            9 => 9,
                        ])
                            ->searchable()
                            ->required()
                            ->label('Plazas'), 
                            
                        TextInput::make('km')
                            ->label('Kilometros')
                            ->numeric() // Solo permite números
                            ->integer() // Solo enteros
                            ->required(),
                        
                        TextInput::make('cv')
                            ->label('CV')
                            ->numeric() // Solo permite números
                            ->integer() // Solo enteros
                            ->required(),
                            
                        TextInput::make('description')->required()->maxLength(255)->label('Descripción'),

                        TextInput::make('price')
                            ->label('Precio')
                            ->numeric()
                            ->step(0.01) // Acepta valores como 10.50, 99.99
                            ->required(),

                        Radio::make('type_sale')
                            ->label('Tipo')
                            ->options([
                                'Venta' => 'Venta',
                                'Alquiler' => 'Alquiler',
                            ])
                            ->default('Venta')
                            ->columns(2),

                        DatePicker::make('sale_date')
                            ->label('Fecha de venta/alquiler'),


                    ]), 
                Repeater::make('images')
                    ->relationship('images') // Usa la relación con imágenes
                    ->schema([
                        FileUpload::make('image_path')
                            ->image() // Asegura que solo se suban imágenes
                            ->directory('cars') // Carpeta de almacenamiento
                            ->required()
                            ->maxSize(3120) // Limitar a 3 MB
                            ->deleteUploadedFileUsing(fn ($file) => Storage::disk('public')->delete($file)) // Elimina archivo físico
                            ->label('Imagen'),
                    ])
                    // Validar el número máximo de imágenes
                    ->helperText('Puedes agregar hasta ' . $maxImages . ' imágenes.')
                    ->afterStateUpdated(function ($state, $get, $set) use ($maxImages) {
                        // Verifica si se excede el límite de imágenes
                        if (count($state) > $maxImages) {
                            $set('images', array_slice($state, 0, $maxImages)); // Limita a $maxImages
                        }
                    })
                    ->createItemButtonLabel('Agregar Imagen') // Cambiar etiqueta del botón
                    ->columnSpanFull()
                    ->label('Seleccionar imagenes'), // Ocupar todo el ancho

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('registration')->sortable()->searchable(),
                TextColumn::make('brand')->sortable()->searchable(),
                TextColumn::make('model')->sortable(),

                // Mostrar la primera imagen como preview
                ImageColumn::make('images.image_path')
                    ->size(50)
                    ->disk('public')
                    ->label('Imagen'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make() // Agrega la acción de eliminar
                    ->icon('heroicon-o-trash') // Puedes cambiar el ícono si deseas
                    ->color('danger') // Establecer un color rojo para indicar peligro,
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
