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

    /**
     * @OA\Get(
     * path="/api/candidate/",
     * summary="List of candidates",
     * tags={"Candidate"},
     *  @OA\Response(
     *    response=200,
     *     description="List of timeline",
     *    )
     * )
     */
    public function index(Request $request){
        return $this->candidateService->getAll($request->query);
    }

    /**
     * @OA\Get(
     * path="/api/candidate/{candidateId}",
     * summary="Candidate object",
     * tags={"Candidate"},
     * @OA\Parameter( description="ID of candidate", in="path", name="candidateId", required=true, example="1",
     *    @OA\Schema( type="integer", format="int64"
     *    )
     * ),
     *  @OA\Response(
     *    response=200,
     *     description="Candidate object",
     *    )
     * )
     */
    public function getOne($candidateId){
        return $this->candidateService->getOne($candidateId);
    }

    /**
     * @OA\Post(
     * path="/api/candidate",
     * summary="Create candidate",
     * tags={"Candidate"},
     * @OA\RequestBody(
     *     @OA\MediaType(
     *      mediaType="multipart/form-data",
     *      @OA\Schema(
     *       @OA\Property(property="first_name", type="string", format="text", example="John"),
     *       @OA\Property(property="last_name", type="string", format="text", example="doe"),
     *       @OA\Property(property="position", type="string", format="text", example="developer"),
     *       @OA\Property(property="min_salary", type="number", format="number", example="1000"),
     *       @OA\Property(property="max_salary", type="number", format="number", example="2000"),
     *       @OA\Property(property="skill_ids[]", type="number", format="number", example="1"),
     *       @OA\Property(property="linkedin_url", type="string", format="text", example="https://www.linkedin.com/feed/"),
     *       @OA\Property( property="cv", type="file" ),
     *      )
     *   )
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong schema. Please try again")
     *        )
     *     )
     * )
     */
    public function create(CandidateStoreRequest $request){
        return $this->candidateService->create($request);
    }

    /**
     * @OA\Post(
     * path="/api/candidate/{candidateId}/status",
     * summary="Create candidate",
     * tags={"Candidate"},
     * @OA\Parameter( description="ID of candidate", in="path", name="candidateId", required=true, example="1",
     *    @OA\Schema( type="integer", format="int64" )
     * ),
     * @OA\RequestBody(
     *     @OA\MediaType(
     *      mediaType="multipart/form-data",
     *      @OA\Schema(
     *       @OA\Property(property="status", type="string", format="text", example="First Contact"),
     *       @OA\Property(property="comment", type="string", format="text", example="comment"),
     *      )
     *   )
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong schema. Please try again")
     *        )
     *     )
     * )
     */
    public function changeStatus($candidateId, CandidateStatusRequest $request){
        return $this->candidateService->changeStatus($candidateId, $request);
    }

    /**
     * @OA\Get(
     * path="/api/candidate/{candidateId}/timeline",
     * summary="List of Timeline",
     * tags={"Candidate"},
     * @OA\Parameter( description="ID of candidate", in="path", name="candidateId", required=true, example="1",
     *    @OA\Schema( type="integer", format="int64"
     *    )
     * ),
     *  @OA\Response(
     *    response=200,
     *     description="List of timeline",
     *    )
     * )
     */
    public function getTimeline(){
        return $this->candidateService->getTimeline();
    }

}
