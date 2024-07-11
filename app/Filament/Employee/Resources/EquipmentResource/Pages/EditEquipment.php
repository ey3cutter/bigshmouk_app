<?php

namespace App\Filament\Employee\Resources\EquipmentResource\Pages;

use App\Filament\Employee\Resources\EquipmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEquipment extends EditRecord
{
    protected static string $resource = EquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
