<?php

namespace App\Services\Skill;

use App\Repositories\Skill\SkillRepository;
use Symfony\Component\HttpFoundation\ParameterBag;

class SkillService
{
    protected $skillRepository;
    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function getAll(ParameterBag $params){
        return $this->skillRepository->getAll($params);
    }

}
