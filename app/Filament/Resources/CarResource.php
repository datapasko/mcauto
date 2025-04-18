<?php

namespace App\Filament\Resources;

use App\Models\Car;
use Filament\Forms;
use Filament\Tables;
use App\Models\Image;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
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
        $maxImages = 7; // Limitar a un máximo de 5 imágenes        

        return $form
            ->schema([
                Hidden::make('user_id')->default(fn () => Filament::auth()->user()->id),
                Grid::make(4)
                    ->schema([

                        Select::make('type')->options([
                            "Furgoneta" => "Furgoneta", 
                            "Coche" => "Coche", 
                            "Camión" => "Camión", 
                        ])
                            ->required()
                            ->label('Tipo de vehiculo'),

                        TextInput::make('registration')->maxLength(255)->label('Matricula'),

                        TextInput::make('brand')->maxLength(255)->label('Marca'),
        
                        TextInput::make('model')->maxLength(255)->label('Modelo'),
        
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
                            ->label('Color'),
                        
                        Select::make('year')
                            ->label('Año matriculación')
                            ->options(array_combine(
                                range(date('Y') + 1, 1950), // Genera años desde 1950 hasta el año actual + 1
                                range(date('Y') + 1, 1950)
                            ))
                            ->searchable()
                            ->required(),

                        Select::make('fuel')->options([
                            "Diésel" => "Diésel", 
                            "Eléctrico" => "Eléctrico", 
                            "Gasolina" => "Gasolina", 
                            "GLP" => "GLP", 
                            "Híbrido" => "Híbrido", 
                        ])
                            ->searchable()
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
                            ->label('Puertas'),

                        Select::make('places')->options([
                            2 => 2, 
                            3 => 3, 
                            4 => 4, 
                            5 => 5,
                            6 => 6,
                            7 => 7,
                            8 => 8,
                            9 => 9,
                            10 => 10,
                            11 => 11,
                            12 => 12,
                        ])
                            ->searchable()
                            ->label('Plazas'), 
                            
                        TextInput::make('km')
                            ->label('Kilometros')
                            ->numeric() // Solo permite números
                            ->integer(), // Solo enteros,
                        
                        TextInput::make('cv')
                            ->label('CV')
                            ->numeric() // Solo permite númerosñ
                            ->integer(),

                        TextInput::make('cylindrical')
                            ->label('Cilindrada')
                            ->numeric() // Solo permite números
                            ->integer(),

                        Select::make('sticker')->options([
                                'Cero emisiones' => 'Cero emisiones', 
                                'ECO' => 'ECO', 
                                'C' => 'C', 
                                'B' => 'B',
                                'Sin etiqueta' => 'Sin etiqueta'
                            ])
                                ->searchable()
                                ->label('Etiqueta ambiental'), 

                        Toggle::make('preferential')
                            ->label('Preferente')
                            ->onColor('success')
                            ->offColor('danger')
                            ->default(false), // Valor por defecto activado
                            
                        TextInput::make('description')->maxLength(255)->label('Descripción'),

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
                                ->maxSize(4120) // Limitar a 4 MB
                                //->multiple() // Permite la selección múltiple de archivos
                                //->maxFiles($maxImages) // Limita el número máximo de archivos
                                ->deleteUploadedFileUsing(fn ($file) => Storage::disk('public')->delete($file)) // Elimina archivo físico
                                ->label('Imagen'),
                        ])
                        ->helperText('Puedes agregar hasta ' . $maxImages . ' imágenes.')
                        ->afterStateUpdated(function ($state, $get, $set) use ($maxImages) {
                            // Verifica si se excede el límite de imágenes
                            if (count($state) > $maxImages) {
                                $set('images', array_slice($state, 0, $maxImages)); // Limita a $maxImages
                            }
                        })
                        ->createItemButtonLabel('Agregar Imagen') // Cambiar etiqueta del botón
                        ->columnSpanFull()
                        ->default([])
                        ->label('Seleccionar imágenes'),

                /* Repeater::make('images')
                    ->relationship('images') // Usa la relación con imágenes
                    ->schema([
                        FileUpload::make('image_path')
                            ->image() // Asegura que solo se suban imágenes
                            ->directory('cars') // Carpeta de almacenamiento
                            ->required()
                            ->maxSize(4120) // Limitar a 3 MB
                            ->multiple()
                            //->maxFiles(7)
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
                    ->default([])
                    ->label('Seleccionar imagenes'), // Ocupar todo el ancho */

            ]);
    }


    /* public static function afterSave($record)
    {
        // Si se han subido varias imágenes, las asociamos al car_id
        if ($record->images) {
            foreach ($record->images as $image) {
                Image::create([
                    'car_id' => $record->id,  // Asignamos el car_id a cada imagen
                    'image_path' => $image['image_path'],
                ]);
            }
        }
    } */

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
