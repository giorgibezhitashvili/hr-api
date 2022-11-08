<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateStatusRequest;
use App\Http\Requests\CandidateStoreRequest;
use App\Services\Candidate\CandidateService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    protected $candidateService;

    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    public function index(Request $request){
        return $this->candidateService->getAll($request->query);
    }

    public function getOne($candidateId){
        return $this->candidateService->getOne($candidateId);
    }

    public function create(CandidateStoreRequest $request){
        return $this->candidateService->create($request);
    }

    public function changeStatus($candidateId, CandidateStatusRequest $request){
        return $this->candidateService->changeStatus($candidateId, $request);
    }

    public function getTimeline(){
        return $this->candidateService->getTimeline();
    }

}
