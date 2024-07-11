<?php

namespace App\Filament\Resources\ClientOrderResource\Pages;

use App\Filament\Resources\ClientOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClientOrder extends CreateRecord
{
    protected static string $resource = ClientOrderResource::class;
}
