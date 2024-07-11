<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['equipment_id', 'quantity'];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::saving(function ($inventory) {
            $equipment = Equipment::find($inventory->equipment_id);

            if ($inventory->quantity > $equipment->quantity) {
                Notification::make()
                    ->title('Ошибка')
                    ->body('Количество оборудования не может превышать доступное количество.')
                    ->danger()
                    ->send();

                return false; // Останавливаем сохранение
            }
        });
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'id', 'equipment_id');
    }
}
