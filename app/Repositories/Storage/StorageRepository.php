<?php

namespace App\Repositories\Storage;

use App\Models\Storage;

class StorageRepository implements StorageRepositoryInterface
{
    protected $model;
    public function __construct(Storage $model)
    {
        $this->model = $model;
    }

    public function create($data): Storage
    {
        return $this->model->create($data);
    }
}
