<?php

namespace App\Repositories\Skill;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\ParameterBag;

interface SkillRepositoryInterface
{
    public function getAll(ParameterBag $params): LengthAwarePaginator;
}
