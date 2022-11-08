<?php

namespace App\Repositories\CandidateComment;

use App\Models\CandidateComment;

class CandidateCommentRepository implements CandidateCommentReposirotyInterface
{
    protected $model;
    public function __construct(CandidateComment $model)
    {
        $this->model = $model;
    }

    public function create($data): CandidateComment
    {
        return $this->model->create($data);
    }

}
