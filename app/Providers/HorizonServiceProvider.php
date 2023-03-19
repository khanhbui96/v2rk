<?php

namespace App\Providers;

use APP\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {

        Gate::define('viewHorizon', function ($user) {
            /**
             * @var User $user
             */
            return in_array($user->getAttribute(User::FIELD_EMAIL), [
                //
            ]);
        });
    }
}