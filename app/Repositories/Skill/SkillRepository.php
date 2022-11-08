<?php

namespace App\Repositories\Skill;

use App\Models\Skill;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\ParameterBag;

class SkillRepository implements SkillRepositoryInterface
{
    protected $model;

    public function __construct(Skill $model)
    {
        $this->model = $model;
    }

    public function getAll(ParameterBag $params): LengthAwarePaginator
    {
        return $this->model->paginate(20);
    }
}
