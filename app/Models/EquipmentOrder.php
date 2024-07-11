<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentOrder extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'equipment_id', 'quantity', 'total_price', 'status'];

    public $timestamps = false;

    public function employee()
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'id', 'equipment_id');
    }
}
