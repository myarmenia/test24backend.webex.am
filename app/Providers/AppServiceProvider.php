<?php

namespace App\Providers;

use App\Interfaces\GetOptionServiceInterface;
use App\Services\AnswerTypeService;
use App\Services\GradeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(GetOptionServiceInterface::class, AnswerTypeService::class);
        $this->app->bind(GetOptionServiceInterface::class, GradeService::class);
    }
}
