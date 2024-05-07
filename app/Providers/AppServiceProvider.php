<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Gate::define('administrator', function (User $user) {
            return ($user->role === 'administrator');
        });

        Gate::define('presenter', function (User $user) {
            return ($user->participant->participant_type !== 'participant');
        });

        Gate::define('participant', function (User $user) {
            return ($user->participant->participant_type === 'participant');
        });
    }
}
