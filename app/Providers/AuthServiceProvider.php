<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\OwnerPolicy;
use App\Policies\CarPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Car;
use App\Models\Image;
use App\Models\owner;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        owner::class => OwnerPolicy::class,
        Car::class => CarPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('delete-owner', function (User $user, owner $owner){
            if($user->type==3){return true;}
            if(($user->type==1 || $user->type==2) && $owner->user_id == $user->id){return true;}
        });
        Gate::define('edit-owner', function (User $user, owner $owner){
            if($user->type==3){return true;}
            if(($user->type==1 || $user->type==2) && $owner->user_id == $user->id){return true;}
        });
        Gate::define('view-owner', function (User $user){
            return $user->type==2 || $user->type==3;
        });
        Gate::define('delete-car', function (User $user, car $car){
            return $user->type === 3 || $car->owner->user_id === $user->id;
        });
        Gate::define('edit-car', function (User $user, car $car){
            return $user->type === 3 || $car->owner->user_id === $user->id;
        });
    }
}
