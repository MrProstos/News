<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Иногда требуется сделать данные общедоступными для всех шаблонов, отображаемыми вашим приложением.
         * Вы можете сделать это, используя метод share фасада View.
         * Как правило, вызов метода share осуществляется в методе boot поставщика App\Providers\AppServiceProvider или
         * вы можете создать отдельного поставщика для их размещения:*/
        // View::share('key', 'value');
    }
}
