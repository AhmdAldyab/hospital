<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositry\DoctorRepositryInterface','App\Repositry\DoctorRepositry');
        $this->app->bind('App\Repositry\NuresRepositryInterface','App\Repositry\NuresRepositry');
        $this->app->bind('App\Repositry\SectionRepositryInterface','App\Repositry\SectionRepositry');
        $this->app->bind('App\Repositry\RoomRepositryInterface','App\Repositry\RoomRepositry');
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
