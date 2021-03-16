<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

/**
 * summary
 */
class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * summary
     */

    public function register()
    {
        $this->app->bind(
        	'App\Repositories\studentInterface',
        	'App\Repositories\studentRepository'
        );
    }

}