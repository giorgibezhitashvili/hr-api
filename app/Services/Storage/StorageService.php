<?php

namespace App\Services\Storage;

use App\Repositories\Storage\StorageRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StorageService
{
    protected $storageRepository;
    public function __construct(StorageRepositoryInterface $storageRepository)
    {
        $this->storageRepository = $storageRepository;
    }

    public function upload(UploadedFile $file){
        $name = $file->getClientOriginalName();
        $path = $file->store('candidate_cvs', 'public');

        return $this->storageRepository->create(['name' => $name, 'path' => $path]);
    }
}
