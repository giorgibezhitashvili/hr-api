<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateTimeline extends Model
{
    use HasFactory;

    protected $table = 'candidate_timeline';
    protected $fillable = [
        'status',
        'comment_id',
        'candidate_id'
    ];

    public function comment()
    {
        return $this->hasOne(CandidateComment::class, 'id', 'comment_id');
    }
}
