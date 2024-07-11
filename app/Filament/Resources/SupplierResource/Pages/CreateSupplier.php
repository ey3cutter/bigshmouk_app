<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use App\Filament\Resources\SupplierResource;
use App\Models\Supplier;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;

class CreateSupplier extends CreateRecord
{
    protected static string $resource = SupplierResource::class;

    /**
     * @throws Halt
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Проверяем уникальность email
        if (Client::where('email', $data['email'])->exists()) {
            Notification::make()
                ->title('Ошибка')
                ->body('Адрес электронной почты уже используется.')
                ->danger()
                ->send();

            // Останавливаем процесс создания
            $this->halt();
        }

        return $data;
    }
}
