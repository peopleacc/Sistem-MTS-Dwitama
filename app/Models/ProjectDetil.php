<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetil extends Model
{
    use HasFactory;

    protected $table = 't_project_detil';

    protected $fillable = [
        'kode',
        'jumlah',
        'project_id',
        'ket',
    ];

    protected $casts = [
        'jumlah' => 'integer',
    ];

    /**
     * Project yang memiliki detail ini.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}
