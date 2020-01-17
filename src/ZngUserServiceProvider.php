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
        $this->loadViewsFrom(__DIR__ . '/views/', 'User'); // 视图目录指定
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->publishes([
            __DIR__.'/views/user/'=>base_path('resources/views/zngue/user'),
            __DIR__ . '/user.php' => config_path('zngue/user.php'), // 发布配置文件到 laravel 的config 下
            __DIR__.'/routes.php'=>base_path('route/zngue/user.php')
        ]);
    }
}
