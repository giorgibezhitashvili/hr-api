<?php

namespace App\Providers;

use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Candidate\CandidateRepositoryInterface;
use App\Repositories\Skill\SkillRepository;
use App\Repositories\Skill\SkillRepositoryInterface;
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
