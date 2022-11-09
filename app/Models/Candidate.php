<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidate';

    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'storage_id',
        'status',
        'min_salary',
        'max_salary',
        'linkedin_url'
    ];

    public function cv()
    {
        return $this->hasOne(Storage::class, 'id', 'storage_id');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class, 'candidate_and_skill');
    }
}
