<?php

namespace App\Filament\Client\Resources\MyOrdersResource\Pages;

use App\Filament\Client\Resources\MyOrdersResource;
use Filament\Actions;
use App\Models\Service;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateMyOrders extends CreateRecord
{
    protected static string $resource = MyOrdersResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Установить client_id текущего авторизованного пользователя
        $data['client_id'] = Auth::id();
        $data['price'] = Service::find($data['service_id'])->price; // Установить цену услуги
        return $data;
    }
}
