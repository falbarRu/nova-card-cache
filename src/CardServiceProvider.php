<?php namespace Falbar\NovaCardCache;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

/**
 * Class CardServiceProvider
 * @package Falbar\NovaCardCache
 */
class CardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $oEvent) {
            Nova::script('nova-card-cache', __DIR__ . '/../dist/js/card.js');
        });
    }

    /**
     * Register the card's routes
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova'])
            ->prefix('nova-vendor/nova-card-cache')
            ->group(__DIR__ . '/../routes/api.php');
    }
}
