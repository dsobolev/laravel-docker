<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SampleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('sample', function(){
            $sample_config = config('services.sample_config');
            $dep = new \App\SampleDependency;

            return new \App\Sample($dep, $sample_config);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
