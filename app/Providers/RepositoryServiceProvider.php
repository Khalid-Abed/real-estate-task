<?php

namespace App\Providers;

use App\Http\Interfaces\AccountInterface;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\JobInterface;
use App\Http\Interfaces\ProjectInterface;
use App\Http\Interfaces\TaskInterface;
use App\Http\Repositories\AccountRepository;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\JobRepository;
use App\Http\Repositories\ProjectRepository;
use App\Http\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
        $this->app->bind(AccountInterface::class,AccountRepository::class);
        $this->app->bind(ProjectInterface::class,ProjectRepository::class);
        $this->app->bind(JobInterface::class,JobRepository::class);
        $this->app->bind(TaskInterface::class,TaskRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
