<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
        //Mengatur Hak Akses untuk Admin
        Gate::define('admin-only', function ($user) {
            if ($user->level == 'admin') {
                return true;
            }
            return false;
        });
        //Mengatur Hak Akses untuk karyawan
        Gate::define('operator-only', function ($user) {
            if ($user->level == 'operator') {
                return true;
            }
            return false;
        });
        //Mengatur Hak Akses untuk pelanggan
        Gate::define('pelanggan-only', function ($user) {
            if ($user->level == 'pelanggan') {
                return true;
            }
            return false;
        });
        //Mengatur Hak Akses untuk pemilik
        Gate::define('pemilik-only', function ($user) {
            if ($user->level == 'pemilik') {
                return true;
            }
            return false;
        });
    }
}
