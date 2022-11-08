<?php

namespace App\Repositories\CandidateComment;

use App\Models\CandidateComment;

interface CandidateCommentReposirotyInterface
{
    public function create($data): CandidateComment;
}
