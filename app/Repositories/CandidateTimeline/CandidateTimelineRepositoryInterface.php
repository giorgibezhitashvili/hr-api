<?php

namespace App\Repositories\CandidateTimeline;

use App\Models\CandidateTimeline;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CandidateTimelineRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function create($data): CandidateTimeline;
}
