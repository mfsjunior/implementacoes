<?php

namespace App\Providers;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
Use App\Models\Produto;

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**O policy deve ser registradooooooooooooooooooooooooooo
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Produto' => 'App\Policies\ProdutoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        $this->registerPolicies();

        
        Gate::define('ver-produto', function(User $user, Produto $produto)
        {

            return $user->id == $produto->id_user;
        });


        
    }
}
