<?php

    namespace Tshafer\Watchable;

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
            $this->setup( __DIR__ )
                 ->publishMigrations();
        }
    }
