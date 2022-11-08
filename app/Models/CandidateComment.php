<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateComment extends Model
{
    use HasFactory;
    protected $table = 'candidate_comment';
    protected $fillable = [
        'comment'
    ];
}
