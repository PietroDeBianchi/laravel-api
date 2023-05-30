<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project'; // to add! 

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image',
        'slug',
        'skill_id'
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
