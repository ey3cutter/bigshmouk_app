<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';

    protected $guarded = false;

    protected $fillable = ['equipment_type', 'equipment_brand', 'model', 'price', 'quantity', 'supplier_id'];

    public $timestamps = false;

    public function equipmentOrder()
    {
        return $this->belongsTo(EquipmentOrder::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
