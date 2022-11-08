<?php

namespace App\Services\Candidate;

use App\Http\Requests\CandidateStoreRequest;
use App\Repositories\Candidate\CandidateRepositoryInterface;
use App\Services\Storage\StorageService;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CandidateService
{
    protected $candidateRepository;
    protected $storageService;

    public function __construct(
        CandidateRepositoryInterface $candidateRepository,
        StorageService $storageService
    )
    {
        $this->candidateRepository = $candidateRepository;
        $this->storageService = $storageService;
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
        if($request->has('cv')){
            $storage = $this->storageService->upload($request->file('cv'));
            $request->merge(['storage_id' => $storage->id]);
        }

        return $this->candidateRepository->create($request->all());
    }

}
