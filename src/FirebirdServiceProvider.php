<?php

namespace Firebird;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

class FirebirdServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     * This is where the connection gets registered
     *
     * @return void
     */
    public function register()
    {
        Connection::resolverFor('firebird', function ($connection, $database, $prefix, $config) {
            $connector = new FirebirdConnector();
            $pdo = $connector->connect($config);

            return new FirebirdConnection($pdo, $database, $prefix, $config);
        });
    }
}
