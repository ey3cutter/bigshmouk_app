<?php

namespace App\Filament\Resources\ClientOrderResource\Pages;

use App\Filament\Resources\ClientOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientOrders extends ListRecords
{
    protected static string $resource = ClientOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
