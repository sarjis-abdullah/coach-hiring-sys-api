<?php

namespace App\Providers;

use App\Models\Package;
use App\Models\SportType;
use App\Repositories\EloquentPackageRepository;
use App\Repositories\EloquentSportTypeRepository;
use App\Repositories\interfaces\PackageRepositoryInterface;
use App\Repositories\interfaces\SportTypeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // bind PackageRepository
        $this->app->bind(PackageRepositoryInterface::class, function() {
            return new EloquentPackageRepository(new Package());
        });

        // bind SportTypeRepository
        $this->app->bind(SportTypeRepositoryInterface::class, function() {
            return new EloquentSportTypeRepository(new SportType());
        });
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
