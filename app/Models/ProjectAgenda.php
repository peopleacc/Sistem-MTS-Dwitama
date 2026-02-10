<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAgenda extends Model
{
    use HasFactory;

    protected $table = 't_project_agenda';

    protected $fillable = [
        'project_id',
        'tgl',
        'jam',
        'lokasi',
        'ket',
        'respon',
        'tgl_respond',
        'status',
    ];

    protected $casts = [
        'tgl' => 'date',
        'tgl_respond' => 'datetime',
        'status' => 'integer',
    ];

    /**
     * Project yang memiliki agenda ini.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}
