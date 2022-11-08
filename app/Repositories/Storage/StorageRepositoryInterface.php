<?php

namespace App\Repositories\Storage;

use App\Models\Storage;

interface StorageRepositoryInterface
{
    public function create($data): Storage;
}
