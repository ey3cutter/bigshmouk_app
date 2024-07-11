<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use LaraZeus\Boredom\Concerns\HasBoringAvatar;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $table = 'employees';

    protected $guarded = false;

    protected $fillable = ['email', 'password', 'name', 'phone', 'is_admin'];

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public static function rules($id = null)
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('employees')->ignore($id)],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'integer', 'min:10', 'max:10'],
            'is_admin' => ['required', 'boolean'],
        ];
    }
    public function clientOrders()
    {
        return $this->hasMany(ClientOrder::class, 'employee_id');
    }
    public function equipmentOrders()
    {
        return $this->hasMany(EquipmentOrder::class, 'employee_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
