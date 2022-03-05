<?php

namespace App\Providers;

use App\Models\Package;
use App\Models\SportType;
use App\Models\User;
use App\Repositories\EloquentPackageRepository;
use App\Repositories\EloquentSportTypeRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\interfaces\PackageRepositoryInterface;
use App\Repositories\interfaces\SportTypeRepositoryInterface;
use App\Repositories\interfaces\UserRepositoryInterface;
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

        // bind UserRepository
        $this->app->bind(UserRepositoryInterface::class, function() {
            return new EloquentUserRepository(new User());
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
