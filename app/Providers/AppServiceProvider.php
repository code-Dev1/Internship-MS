<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Internship;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        Paginator::useBootstrapFive();

        Gate::define('selfCompany', function (User $user, Company $company) {
            return $user->id === $company->user_id;
        });
        Gate::define('selfInternship', function (User $user, Internship $internship) {
            return $user->company->id === $internship->company_id;
        });
        Gate::define('selfApplication', function (User $user, Application $application) {
            return $user->company->id === $application->company_id;
        });

        Gate::define('isAdmin', function () {
            return Auth::user()->role === 'admin';
        });
        Gate::define('isCompany', function () {
            return Auth::user()->role === 'company';
        });
    }
}
