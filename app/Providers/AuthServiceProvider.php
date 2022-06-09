<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\JWT;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.
        //Reglas para los usuarios que puedan acceder
        $this->app['auth']->viaRequest('api', function ($request) {

            $token  = $request->header('Authorization');
            if (strstr($token, "Bearer")) {
                $token = substr($token, 7);
            }

            if ($token) {
                if (JWT::verify($token, env(
                    'JWT_SECRET',
                    'sqe6ezCV9YRm6DZNsfEvmq0vEn0k5WKb'
                ))==0) {
                    return JWT::get_data($token,  env(
                        'JWT_SECRET',
                        'sqe6ezCV9YRm6DZNsfEvmq0vEn0k5WKb'
                    ));
                }
            }


            // if ($request->input('api_token')) {
            //     return User::where('api_token', $request->input('api_token'))->first();
            // }


        });
    }
}
