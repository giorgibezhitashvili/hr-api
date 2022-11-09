<?php

namespace App\Services\Candidate;

use App\Http\Requests\CandidateStatusRequest;
use App\Http\Requests\CandidateStoreRequest;
use App\Repositories\Candidate\CandidateRepositoryInterface;
use App\Repositories\CandidateComment\CandidateCommentReposirotyInterface;
use App\Repositories\CandidateTimeline\CandidateTimelineRepositoryInterface;
use App\Services\Storage\StorageService;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CandidateService
{
    protected $candidateRepository;
    protected $storageService;
    protected $candidateCommentReposiroty;
    protected $candidateTimelineRepository;

    public function __construct(
        CandidateRepositoryInterface $candidateRepository,
        CandidateCommentReposirotyInterface $candidateCommentReposiroty,
        CandidateTimelineRepositoryInterface $candidateTimelineRepository,
        StorageService $storageService
    )
    {
        $this->candidateRepository = $candidateRepository;
        $this->storageService = $storageService;
        $this->candidateCommentReposiroty = $candidateCommentReposiroty;
        $this->candidateTimelineRepository = $candidateTimelineRepository;
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

    public function changeStatus($candidateId,CandidateStatusRequest $request){
        $this->getOne($candidateId);
        $this->candidateRepository->changeStatus($candidateId, $request->get('status'));
        $comment = $this->candidateCommentReposiroty->create(['comment' => $request->get('comment')]);
        $this->candidateTimelineRepository->create(['candidate_id' =>$candidateId, 'status' => $request->get('status'), 'comment_id' => $comment->id]);
        return $this->getOne($candidateId);
    }

    public function getTimeline(){
        return $this->candidateTimelineRepository->getAll();
    }

}
