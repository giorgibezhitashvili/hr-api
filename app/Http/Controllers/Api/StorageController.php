<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Storage\StorageService;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    protected $storageService;
    public function __construct(StorageService $storageService)
    {
        $this->storageService = $storageService;
    }

    public function upload(){

    }
}
