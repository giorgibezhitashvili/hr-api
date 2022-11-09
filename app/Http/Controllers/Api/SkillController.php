<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Skill\SkillService;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    protected $skillService;
    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    /**
     * @OA\Get(
     * path="/api/skill",
     * summary="List of skills",
     * tags={"Skill"},
     *  @OA\Response(
     *    response=200,
     *     description="List of skills",
     *    )
     * )
     */
    public function index(Request $request){
        return $this->skillService->getAll($request->query);
    }
}
