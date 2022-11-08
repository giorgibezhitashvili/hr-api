<?php

namespace App\Services\Candidate;

use App\Http\Requests\CandidateStoreRequest;
use App\Repositories\Candidate\CandidateRepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CandidateService
{
    protected $candidateRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function getAll(ParameterBag $params){
        return $this->candidateRepository->getAll($params);
    }

    public function getOne(int $id){
        $candidate = $this->candidateRepository->getOne($id);
        if(!$candidate){
            throw new NotFoundHttpException('Candidate not found');
        }
        return $candidate;
    }

    public function create(CandidateStoreRequest $request){
        return $this->candidateRepository->create($request->validated());
    }

}
