<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'password',
        'notelp',
        'email',
        'alamat',
        'level',
        'role',
        'status',
        'create_by',
        'update_date',
        'userid_undc',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
        'foto',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'create_by' => 'datetime',
            'update_date' => 'datetime',
        ];
    }

    /**
     * Get the customers for the user.
     */
    public function customers()
    {
        return $this->hasMany(\App\Models\Customer::class);
    }
}
