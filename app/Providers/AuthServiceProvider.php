<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Product;
use App\Models\User;
use App\Services\PermissionGatePolicyAccess;
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
        'App\Model\Category' => 'App\Policies\CategoryPolicy',
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        // $this->registerPolicies();
        $permissionGateAndPolicy = new PermissionGatePolicyAccess();
        $permissionGateAndPolicy->setGateAndPolicyAccess();
    }


}
