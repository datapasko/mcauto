<?php

namespace App\Filament\Resources\CarResource\Pages;

use App\Models\Image;
use Filament\Actions;
use App\Filament\Resources\CarResource;
use Filament\Resources\Pages\EditRecord;

class EditCar extends EditRecord
{
    protected static string $resource = CarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
