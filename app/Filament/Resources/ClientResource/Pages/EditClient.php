<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\Client;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
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
