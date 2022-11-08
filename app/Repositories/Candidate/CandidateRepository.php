<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\ParameterBag;

class CandidateRepository  implements CandidateRepositoryInterface
{
    protected $model;

    public function __construct(Candidate $model)
    {
        $this->model = $model;
    }


    public function getAll(ParameterBag $params): LengthAwarePaginator
    {
        return $this->model->with(['skills'])->paginate(20);
    }

    public function getOne(int $id): ?Candidate
    {
        return $this->model->find($id);
    }

    public function create($data): Candidate
    {
        $candidate = $this->model->create($data);
        $candidate->skills()->attach($data['skill_ids']);
        return $candidate->fresh()->load(['skills', 'cv']);
    }

}
