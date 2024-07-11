<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $guarded = false;

    protected $fillable = ['name', 'price'];

    public $timestamps = false;

    public function clientOrder()
    {
        return $this->belongsTo(ClientOrder::class);
    }
}
