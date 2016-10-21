<?php


namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Если композер реализуется при помощи класса:
        // View::composer('*', 'App\Http\ViewComposers\GoodsComposer');

        // Если композер реализуется в функции-замыкании:
//        View::composer('dashboard', function(){
//
//        }
//        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}