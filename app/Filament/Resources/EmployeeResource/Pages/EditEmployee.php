<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use App\Models\Employee;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Проверяем уникальность email
        if (Employee::where('email', $data['email'])->exists()) {
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
