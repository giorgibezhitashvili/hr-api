<?php

namespace App\Providers;

use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Candidate\CandidateRepositoryInterface;
use App\Repositories\CandidateComment\CandidateCommentReposirotyInterface;
use App\Repositories\CandidateComment\CandidateCommentRepository;
use App\Repositories\CandidateTimeline\CandidateTimelineRepository;
use App\Repositories\CandidateTimeline\CandidateTimelineRepositoryInterface;
use App\Repositories\Skill\SkillRepository;
use App\Repositories\Skill\SkillRepositoryInterface;
use App\Repositories\Storage\StorageRepository;
use App\Repositories\Storage\StorageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CandidateRepositoryInterface::class, CandidateRepository::class);
        $this->app->bind(SkillRepositoryInterface::class, SkillRepository::class);
        $this->app->bind(StorageRepositoryInterface::class, StorageRepository::class);
        $this->app->bind(CandidateTimelineRepositoryInterface::class, CandidateTimelineRepository::class);
        $this->app->bind(CandidateCommentReposirotyInterface::class, CandidateCommentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
