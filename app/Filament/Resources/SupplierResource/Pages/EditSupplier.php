<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use App\Filament\Resources\SupplierResource;
use App\Models\Supplier;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditSupplier extends EditRecord
{
    protected static string $resource = SupplierResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Проверяем уникальность email
        if (Supplier::where('email', $data['email'])->exists()) {
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
