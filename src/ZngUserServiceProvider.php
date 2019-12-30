<?php

namespace Zngue\User;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Zngue\User\Middleware\LoginMiddleware;
class ZngUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        //$this->aliasMiddleware();

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('login', LoginMiddleware::class);
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}
