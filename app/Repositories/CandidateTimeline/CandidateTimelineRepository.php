<?php

namespace App\Repositories\CandidateTimeline;

use App\Models\CandidateTimeline;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CandidateTimelineRepository implements CandidateTimelineRepositoryInterface
{
    protected $model;
    public function __construct(CandidateTimeline $model)
    {
        $this->model = $model;
    }

    public function create($data): CandidateTimeline
    {
        return $this->model->create($data);
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->model->with(['comment'])->paginate(20);
    }
}
