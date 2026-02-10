<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 't_customer';
    protected $primaryKey = 'custid';

    protected $fillable = [
        'nama',
        'alamat',
        'lokasi',
        'user_id',
        'npwp',
        'notelp',
        'emailid',
        'pic',
        'bidang',
        'create_by',
        'update_de',
    ];

    protected $hidden = [
        'pic', // binary field
    ];

    protected $casts = [
        'create_by' => 'datetime',
        'update_de' => 'datetime',
    ];

    /**
     * User (sales) yang menangani customer ini.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Projects milik customer ini.
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'custid', 'custid');
    }
}
