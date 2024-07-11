<?php

namespace App\Filament\Employee\Resources\EquipmentOrderResource\Pages;

use App\Filament\Employee\Resources\EquipmentOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEquipmentOrders extends ListRecords
{
    protected static string $resource = EquipmentOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
