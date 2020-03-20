<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
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
    public function boot(UrlGenerator $url)
    {
        //
        $url->forceScheme('https');
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
        Blade::directive('test', function ($expression){
//            return "$expression";
            return "<?php echo $expression->format('Ymd');?>";
        });


    }

}
