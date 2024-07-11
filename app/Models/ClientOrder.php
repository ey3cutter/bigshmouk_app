<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ClientOrder extends Model
{
    use HasFactory;

    protected $table = 'client_orders';

    protected $guarded = false;

    protected $fillable = ['description', 'status', 'date_of_order', 'client_id', 'employee_id', 'service_id', 'audio_file'];

    public $timestamps = false;

    public function getAudioFileUrlAttribute(): string
    {
        return $this->audio_file ? asset('storage/' . $this->audio_file) : '';
    }

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
