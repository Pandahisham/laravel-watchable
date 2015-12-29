<?php

namespace Tshafer\Watchable;

use Cviebrock\EloquentSluggable\SluggableServiceProvider;
use Tshafer\ServiceProvider\ServiceProvider as BaseProvider;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends BaseProvider
{
    /**
     * @var string
     */
    protected $packageName = 'watchable';

    /**
     *
     */
    public function boot()
    {
        $this->setup(__DIR__)->publishMigrations();
    }

    public function register()
    {
        $this->app->register(SluggableServiceProvider::class);
    }
}
