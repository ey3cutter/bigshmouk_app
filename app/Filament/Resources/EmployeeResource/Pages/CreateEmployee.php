<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use App\Models\Employee;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    /**
     * @throws Halt
     */
    protected function mutateFormDataBeforeCreate(array $data): array
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
