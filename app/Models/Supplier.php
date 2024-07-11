<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;

class Supplier extends Authenticatable
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $guarded = false;

    protected $fillable = ['email', 'password', 'name', 'phone'];

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
            'email' => ['required', 'email', 'max:255', Rule::unique('clients')->ignore($id)],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'integer', 'min:10', 'max:10'],
        ];
    }
    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'supplier_id');
    }
}
