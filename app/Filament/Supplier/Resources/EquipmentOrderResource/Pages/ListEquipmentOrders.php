<?php

namespace App\Filament\Supplier\Resources\EquipmentOrderResource\Pages;

use App\Filament\Supplier\Resources\EquipmentOrderResource;
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
