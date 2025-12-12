<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        $this->registerPolicies();
        Paginator::defaultView('pagination::bootstrap-4');

        // Используем импортированный
        Gate::define('destroy-player', function (User $user) {
            return $user->id == 1;
        });

        Gate::define('create-match', function (User $user) {
            return true;
        });
    }

    private function registerPolicies()
    {
    }

}
