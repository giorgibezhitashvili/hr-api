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
        $candidateQB = $this->model->with(['skills', 'cv']);

        foreach ($params->all() as $key => $param){
            switch ($key){
                case 'status':
                    $candidateQB->where('status', $param);
                    break;
            }
        }

        return $candidateQB->paginate(20);
    }

    public function getOne(int $id): ?Candidate
    {
        return $this->model->find($id)->load(['skills', 'cv']);
    }

    public function create($data): Candidate
    {
        $candidate = $this->model->create($data);
        if(isset($data['skill_ids'])){
            $candidate->skills()->attach($data['skill_ids']);
        }
        return $candidate->fresh()->load(['skills', 'cv']);
    }

    public function changeStatus(int $id, string $status): void
    {
        $this->model->where('id', $id)->update([ 'status'=> $status ]);
    }

}
