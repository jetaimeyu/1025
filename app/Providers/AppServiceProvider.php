<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
        Blade::directive('test', function ($expression){
//            return "$expression";
            return "<?php echo $expression->format('Ymd');?>";
        });

    }

}
