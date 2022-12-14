<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            if ($user->role=='admin'){
                return true;
            }
            return false;
        });
        Gate::define('user', function ($user) {
            if ($user->role=='user'){
                return true;
            }
            return false;
        });
        Gate::define('profile-complete', function ($user) {
            if ($user->profileCompletePercentage()<=90){
                return false;
            }
            return true;
        });
        Gate::define('if-user-upgraded', function ($user) {
            if (ifUpgraded()){
                return true;
            }
            return false;
        });

    }
}
