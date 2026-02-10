<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFoto extends Model
{
    use HasFactory;

    protected $table = 't_project_foto';

    protected $fillable = [
        'project_id',
        'fotoname',
        'folder',
        'keterangan',
    ];

    protected $hidden = [
        'fotoname', // binary field
    ];

    /**
     * Project yang memiliki foto ini.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}
