<?php

namespace App\Filament\Resources\EquipmentOrderResource\Pages;

use App\Filament\Resources\EquipmentOrderResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Models\Inventory;
use App\Models\Equipment;
use App\Models\EquipmentOrder;
use Illuminate\Support\Facades\Auth;

class EditEquipmentOrder extends EditRecord
{
    protected static string $resource = EquipmentOrderResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $order = EquipmentOrder::find($this->record->id);

        if ($order->status === 'Выполнен' && $data['status'] !== 'Выполнен') {
            Notification::make()
                ->title('Ошибка')
                ->body('Вы не можете изменить статус выполненного заказа.')
                ->danger()
                ->send();

            // Останавливаем процесс изменения
            $this->halt();
        }

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

        return $data;
    }

    protected function beforeSave(): void
    {
        $order = $this->record;
        $newStatus = $this->data['status'];

        if ($order->status === 'Выполнен' && $newStatus === 'Отменён') {
            // Вернуть оборудование поставщику и уменьшить количество на складе
            $inventory = Inventory::where('equipment_id', $order->equipment_id)->first();
            if ($inventory) {
                $inventory->quantity -= $order->quantity;
                $inventory->save();
            }

            $equipment = Equipment::find($order->equipment_id);
            if ($equipment) {
                $equipment->quantity += $order->quantity;
                $equipment->save();
            }
        }
    }

    protected function afterSave(): void
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
            if ($equipment) {
                $equipment->quantity -= $equipmentOrder->quantity;
                $equipment->save();
            }
        }
    }
}
