<?php

namespace App\Filament\Employee\Resources\ClientOrderResource\Pages;

use App\Filament\Employee\Resources\ClientOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientOrder extends EditRecord
{
    protected static string $resource = ClientOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
