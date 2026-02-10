<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 't_project';
    protected $primaryKey = 'project_id';

    protected $fillable = [
        'project_name',
        'custid',
        'alamat',
        'lokasi',
        'ket',
        'status',
        'level',
        'wil',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    /**
     * Customer pemilik project.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'custid', 'custid');
    }

    /**
     * PIC (Person In Charge) project.
     */
    public function pics()
    {
        return $this->hasMany(ProjectPic::class, 'project_id', 'project_id');
    }

    /**
     * Detail project.
     */
    public function details()
    {
        return $this->hasMany(ProjectDetil::class, 'project_id', 'project_id');
    }

    /**
     * Foto-foto project.
     */
    public function fotos()
    {
        return $this->hasMany(ProjectFoto::class, 'project_id', 'project_id');
    }

    /**
     * Agenda project.
     */
    public function agendas()
    {
        return $this->hasMany(ProjectAgenda::class, 'project_id', 'project_id');
    }
}
