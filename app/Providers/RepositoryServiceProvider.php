<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StudentRepository::class, \App\Repositories\StudentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FacultyRepository::class, \App\Repositories\FacultyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SectionRepository::class, \App\Repositories\SectionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ClassroomRepository::class, \App\Repositories\ClassroomRepositoryEloquent::class);
        //:end-bindings:
    }
}
