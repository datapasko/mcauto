<?php

namespace App\Filament\Resources\CarResource\Pages;

use App\Filament\Resources\CarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCar extends CreateRecord
{
    protected static string $resource = CarResource::class;

    protected static ?string $title = 'Crear messi';
    
    protected static ?string $navigationLabel = 'Custom Navigation Label';

    protected function getCreateButtonLabel(): string
    {
        return 'Guardar Carro';
    }
}
