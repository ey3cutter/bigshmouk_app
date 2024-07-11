<?php

namespace App\Filament\Client\Resources\MyOrdersResource\Pages;

use App\Filament\Client\Resources\MyOrdersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyOrders extends EditRecord
{
    protected static string $resource = MyOrdersResource::class;
}
