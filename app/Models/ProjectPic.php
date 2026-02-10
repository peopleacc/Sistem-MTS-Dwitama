<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPic extends Model
{
    use HasFactory;

    protected $table = 't_project_pic';

    protected $fillable = [
        'project_id',
        'name',
        'phone',
        'phone2',
        'email',
        'ket',
    ];

    /**
     * Project yang memiliki PIC ini.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}
