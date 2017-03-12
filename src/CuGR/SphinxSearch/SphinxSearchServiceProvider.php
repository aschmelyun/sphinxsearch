<?php 
namespace CuGR\SphinxSearch;

use CuGR\SphinxSearch\SphinxSearch;
use Illuminate\Support\ServiceProvider;

class SphinxSearchServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SphinxSearch::class, function () {
            return new SphinxSearch(config('sphinxsearch'));
        });
    }


    public function boot()
    {
        $this->publishes([
            ## Original
            #__DIR__.'../../../../config/sphinxsearch.php' => config_path('sphinxsearch.php'),

            ## https://github.com/sngrl/sphinxsearch/issues/3
            __DIR__.'/../../../config/sphinxsearch.php' => config_path('sphinxsearch.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [SphinxSearch::class];
    }

}