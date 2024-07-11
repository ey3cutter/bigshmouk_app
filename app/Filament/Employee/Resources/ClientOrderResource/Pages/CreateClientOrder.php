<?php

namespace App\Filament\Employee\Resources\ClientOrderResource\Pages;

use App\Filament\Employee\Resources\ClientOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClientOrder extends CreateRecord
{
    protected static string $resource = ClientOrderResource::class;
}
