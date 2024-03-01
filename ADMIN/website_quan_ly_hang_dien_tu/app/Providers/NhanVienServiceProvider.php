<?php

namespace App\Providers;

use App\Interfaces\Repositories\INhanVienRepository;
use App\Repositories\NhanVienRepository;
use Illuminate\Support\ServiceProvider;

class NhanVienServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(INhanVienRepository::class, NhanVienRepository::class);
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