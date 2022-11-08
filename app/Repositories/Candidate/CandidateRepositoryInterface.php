<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\ParameterBag;

interface CandidateRepositoryInterface
{
    public function getAll(ParameterBag $params): LengthAwarePaginator;
    public function getOne(int $id): ?Candidate;
    public function create($data): Candidate;
    public function changeStatus(int $id, string $status): void;

}
