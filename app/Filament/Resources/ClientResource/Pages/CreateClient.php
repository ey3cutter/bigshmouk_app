<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Client;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

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
