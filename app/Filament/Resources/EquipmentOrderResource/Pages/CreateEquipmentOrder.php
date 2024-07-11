<?php

namespace App\Filament\Resources\EquipmentOrderResource\Pages;

use App\Filament\Resources\EquipmentOrderResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Equipment;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class CreateEquipmentOrder extends CreateRecord
{
    protected static string $resource = EquipmentOrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $equipment = Equipment::find($data['equipment_id']);
        // Проверяем доступное количество оборудования
        if ($data['quantity'] > $equipment->quantity) {
            Notification::make()
                ->title('Ошибка')
                ->body('Вы не можете закупить оборудования больше, чем оно имеется у поставщика.')
                ->danger()
                ->send();

            // Останавливаем процесс создания
            $this->halt();
        }

        $data['total_price'] = $equipment->price * $data['quantity'];
        $data['employee_id'] = Auth::id();

        return $data;
    }

    protected function afterCreate(): void
    {
        $equipmentOrder = $this->record;

        if ($equipmentOrder->status === 'Выполнен') {
            $inventory = Inventory::where('equipment_id', $equipmentOrder->equipment_id)->first();
            if ($inventory) {
                $inventory->quantity += $equipmentOrder->quantity;
                $inventory->save();
            } else {
                Inventory::create([
                    'equipment_id' => $equipmentOrder->equipment_id,
                    'quantity' => $equipmentOrder->quantity,
                ]);
            }

            $equipment = Equipment::find($equipmentOrder->equipment_id);
            $equipment->quantity -= $equipmentOrder->quantity;
            $equipment->save();
        }
    }
}
